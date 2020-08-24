<?php

namespace App\Models\Website;

use App\Traits\PostSlugHelper;
use Illuminate\Database\Eloquent\Model;
use File as FileLar;

class Post extends Model
{
    use PostSlugHelper;
    protected $table = 'posts';
    protected $fillable=['title','content','link','excerpt','nepali_title','nepali_excerpt','nepali_content','image','image_id','logo_image','type','slug','meta_data','template_data','icon','template_page','link','file_id','start_date','end_date','style'];
    public function postImage(){
        return $this->hasOne(File::class,'id','image_id');
    }
    public function fileImage(){
        return $this->hasOne(File::class,'id','file_id');
    }
    public function getImage(){
        if(isset($this->postImage->image_name)) {
            return uploadedAsset('banner', $this->postImage->image_name);
        }
        else {
            return imageNotFound();
        }

    }
    public function getGalleryFile(){
        if(isset($this->postImage->image_name)) {
            return uploadedAsset('gallery', $this->postImage->image_name);
        }
        else {
            return imageNotFound();
        }
    }
    public function getTenderImage(){
        if(isset($this->postImage->image_name)) {
            return uploadedAsset('tender_pic', $this->postImage->image_name);
        }
        else {
            return imageNotFound();
        }

    }
    public function getCareerImage(){
        if(isset($this->postImage->image_name)) {
            return uploadedAsset('career_pic', $this->postImage->image_name);
        }
        else {
            return imageNotFound();
        }

    }
    public function getServiceImage(){
        if(isset($this->image)){
            return uploadedAsset('service',$this->image);

        }
        else{
            return imageNotFound();
        }
    }
    public function getNewsImage(){
        if(isset($this->image)) {
            return uploadedAsset('news_pic', $this->image);
        }
        else {
            return imageNotFound();
        }
    }
    public function getTitle($locale){
        switch ($locale){
            case 'en':
                $title= $this->title;
                break;
            default:
                $title=$this->nepali_title;
        }
        return $title;
    }
    public function getExcerpt($locale){
        switch ($locale){
            case 'en':
                $title= $this->excerpt;
                break;
            default:
                $title=$this->nepali_excerpt;
        }
        return $title;
    }
    public function getContent($locale){
        switch ($locale){
            case 'en':
                $title= $this->content;
                break;
            default:
                $title=$this->nepali_content;
        }
        return $title;
    }


    public function getCreatedAt($locale){
        if($locale==='en'){
            return date('Y-m-d',strtotime($this->created_at));
        }
        return date('Y-m-d',strtotime($this->created_at));
//        dd($locale);
    }
    public function getTestimonialImage(){
        if(isset($this->image)) {
            return uploadedAsset('testimonial_pic', $this->image);
        }
        else {
            return imageNotFound();
        }
    }

    //for cms content image
    public function getPostImage(){
        if(isset($this->postImage->image_name)) {
            return uploadedAsset('post_pic', $this->postImage->image_name);
        }
        else {
            return imageNotFound();
        }
    }

    public function getEventImage(){
        if(isset($this->postImage->image_name)) {
            return uploadedAsset('events_pic', $this->postImage->image_name);
        }
        else {
            return imageNotFound();
        }
    }
    public function getEventFile(){
        if(isset($this->fileImage->image_name)) {
            return uploadedAsset('event_file', $this->fileImage->image_name);
        }
        else {
            return imageNotFound();
        }
    }
    public function getPartnerImage(){

        if(isset($this->image)) {
            return uploadedAsset('partner_pic', $this->image);
        }
        else {
            return imageNotFound();
        }
    }
    public function getLogoImage(){
        if(isset($this->logo_image)) {
            return uploadedAsset('logo_image', $this->logo_image);
        }
        else {
            return imageNotFound();
        }
    }
    /**
     *
     * @return type
     * get file from specific directory
     */
    public function getDirectoryFile() {
        $files = FileLar::allFiles(resource_path('views/web/template/'));
        foreach ($files as $index => $file) {
            $files_directory[$index] = basename(str_replace(".blade.php", "", $file));
        }
        return $files_directory;
    }

}
