<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $fillable=['image_name','full_url'];

    public function getImage($type='original'){
        if (isset($this->image)) {
            if($type=='large'){
                return uploadedAsset('product/large', $this->image);

            }
            elseif ($type==='medium'){
                return uploadedAsset('product/medium', $this->image);
            }
            elseif ($type==='small'){
                return uploadedAsset('product/small', $this->image);

            }
            return uploadedAsset('product', $this->image);
        } else {
            return imageNotFound();
        }

    }



}
