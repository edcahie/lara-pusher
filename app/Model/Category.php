<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];


    public static function boot()
    {
        parent::boot();
        self::creating(function ($category) {
            $category->slug = str_slug($category->name);
        });
    }
    public function questions(){

        return $this->hasMany(Question::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
