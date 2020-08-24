<?php

namespace App\Traits;
trait PostSlugHelper
{
    public function setSlugAttribute($value) {
        if(isset($this->id) && (static::where('id','=',$this->id)->whereSlug($slug = str_slug($value))->exists())){
        }
        elseif (static::whereSlug($slug = str_slug($value))->exists()) {

            $slug = $this->incrementSlug($slug);
        }

        $this->attributes['slug'] = $slug;
    }
    public function incrementSlug($slug) {

        $original = $slug;

        $count = 2;

        while (static::whereSlug($slug)->exists()) {

            $slug = "{$original}-" . $count++;
        }

        return $slug;

    }
}
