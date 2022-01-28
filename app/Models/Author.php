<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "author";
    protected $guarded = []; 

    public function news(){
        return $this->hasMany('App\Models\News', 'author_id');
    }
    public function news_count(){
        return $this->news()->count();
    }

}
