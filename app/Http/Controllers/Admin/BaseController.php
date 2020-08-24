<?php

namespace App\Http\Controllers\Admin;

use App\Models\Website\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Storage;
use Image;

class BaseController extends Controller
{
    public function __construct()
    {

    }

    public function view($view, $data = array(), $mergeData = array())
    {
        return View::make('admin.'.$view, $data, $mergeData);
    }

    /**
     * Save only image file
     * @param Request $request
     * @param $fieldName
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function fileUpload(Request $request, $fieldName)
    {
        $this->validate($request, array(
            $fieldName.'_image' =>  'image',
        ));

        try{
            $path =  $request->{$fieldName.'_image'}->store('public/'.$fieldName);

            if (!$path)
                return url('storage');
            $dirs = explode('/', $path);
            if ($dirs[0] === 'public')
                $dirs[0] = 'storage';
            $response['full_url'] = url(implode('/', $dirs));
            $response['image_name'] = ($request->{$fieldName.'_image'})->hashName();
            return $response;


        }
        catch (\Exception $e)
        {
            dd($e);
        }
    }
    public function commonFileUpload(Request $request, $fieldName){
        $this->validate($request, array(
            $fieldName.'_image' =>  'mimes:jpeg,png,jpg,gif,svg,mpga,pdf',
        ));

        try{
            $path =  $request->{$fieldName.'_image'}->store('public/'.$fieldName);
            if (!$path)
                return url('storage');
            $dirs = explode('/', $path);
            if ($dirs[0] === 'public')
                $dirs[0] = 'storage';
            $response['full_url'] = url(implode('/', $dirs));
            $response['image_name'] = ($request->{$fieldName.'_image'})->hashName();
            $file= new File();
            $file->image_name=$response['image_name'];
            $file->full_url=parse_url($response['full_url'],PHP_URL_PATH);
            $file->save();
            $response['id']=$file->id;
            return $response;


        }
        catch (\Exception $e)
        {
            dd($e);
        }
    }

    public function removeUpload(Request $request, $id){
        $file=File::find($id);
        $file->delete($id);
        return response()->json([
        "message"=>'Image has been removed!'
        ]);
    }


    /**
     * Svae nay file with any extension
     * @param Request $request
     * @param $fieldName
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function anyFileUpload(Request $request, $fieldName)
    {
        try{
            $path =  $request->{$fieldName.'_image'}->store('public/'.$fieldName);

            if($fieldName ==='product') {
                $smallthumbnailpath = $request->{$fieldName . '_image'}->store('public/' . $fieldName . '/small');
//                $mediumthumbnailPath = $request->{$fieldName . '_image'}->store('public/' . $fieldName . '/medium');
//                $largethumbnailpath = $request->{$fieldName . '_image'}->store('public/' . $fieldName . '/large');
                $this->createThumbnail(Storage::disk('storage_app')->path($smallthumbnailpath), 255, 291);
//                $this->createThumbnail(Storage::disk('storage_app')->path($mediumthumbnailPath), 300, 185);
//                $this->createThumbnail(Storage::disk('storage_app')->path($largethumbnailpath), 1280, 720);
            }
            if (!$path)
                return url('storage');
            $dirs = explode('/', $path);
            if ($dirs[0] === 'public')
                $dirs[0] = 'storage';
            $response['full_url'] = url(implode('/', $dirs));
            $response['image_name'] = ($request->{$fieldName.'_image'})->hashName();
            return $response;

        }
        catch (\Exception $e)
        {
            dd($e);
        }
    }
    /**
     * Create a thumbnail of specified size
     *
     * @param string $path path of thumbnail
     * @param int $width
     * @param int $height
     */
    public function createThumbnail($path, $width, $height)
    {
//        $img = Image::make($path)->resize($width, $height, function ($constraint) {
//            $constraint->aspectRatio();
//        });
        $img = Image::make($path)->resize($width, $height);
        $img->save($path);
    }
}
