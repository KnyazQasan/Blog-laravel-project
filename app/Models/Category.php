<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $guarded = [];

    public function news(){
        return $this->hasMany('App\Models\News', 'category_id');
    }
    public function limitedNews(){
        return $this->news()->where('c_view',1)->limit(3);
    }
    public function news_count(){
        return $this->news()->count();
    }
}
