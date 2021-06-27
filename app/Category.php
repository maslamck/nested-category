<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }
    // public function parent()
    // {
    //     // return $this->belongsTo(Category::class)->with('categories');
    //     return $this->belongsTo(Category::class,'category_id')->with('categories');
    // }
    //---------
    // public function children() {
    //     return $this->hasMany(Category::class, 'category_id', 'id');
    // }
    
    public function parent() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
