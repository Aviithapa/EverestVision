<?php

namespace App\Models\Menus;

use App\Models\Website\Post;
use App\Traits\SlugHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes,SlugHelper;

    public $timestamps = true;

    protected $table =  'menus';

    protected $fillable = [
        'name',
        'nepali_name',
        'slug',
        'display_order',
        'excerpt',
        'url',
        'content',
        'image',
        'parent_id',

    ];
    public function getName($locale){
        switch ($locale){
            case 'en':
                $title= $this->name;
                break;
            default:
                $title=$this->nepali_name;
        }
        return $title;
    }
    public function postSlug(){
        return $this->hasOne(Post::class,'slug','slug');

    }
    public function buildMenu($menu, $parentid = 0)
    {
        $result = null;
        foreach ($menu as $item)
            if ($item->parent_id == $parentid) {

                $result .= "<li class='dd-item nested-list-item' data-order='{$item->display_order}' data-id='{$item->id}'>
	      <div class='dd-handle nested-list-handle'>
	        <span class='glyphicon glyphicon-move'></span>
	      </div>
	      <div class='nested-list-content'>{$item->name}
	        <div class='pull-right'>
	          <a href='" . route('dashboard.menus.edit',$item->id) . "'>Edit</a> |
	          <a href='#deleteModal' class='delete_toggle' rel='{$item->id}'>Delete</a>
	        </div>
               
	      </div>" . $this->buildMenu($menu, $item->id) . "</li>";
            }
        return $result ? "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
    }

    public function getHTML($items)
    {
//        dd($this->buildMenu($items));
        return $this->buildMenu($items);
    }
    public function getProgramImage(){
        if(isset($this->image)) {
            return uploadedAsset('program_pic', $this->image);
        }
        else {
            return imageNotFound();
        }
    }

    public function get_all_menus(){
        $menus=Menu::orderBy('display_order')->get();


        return $menus;
    }
    public function parseTree_menus($list, $parent_id = null,$arrayLevel=0) {
        $result = null;

        $new_array_index = 0;
        foreach ($list as $index => $item) {
            if ($item->parent_id == $parent_id) {
                unset($list[$index]);
                $result[$new_array_index] = $item;
                $result[$new_array_index]->arrayLevel=$arrayLevel;
                $result[$new_array_index]->children = $this->parseTree_menus($list, $item->id,$arrayLevel+1);
                $new_array_index++;
            }
        }

        return $result;
    }
}
