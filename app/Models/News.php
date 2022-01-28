<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $table = 'news';
    protected $guarded = [];
    public function author(){
        return $this->belongsTo('App\Models\Author','author_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment', 'news_id')->orderBy('id','desc');
    }
    public function commentsCount(){
        return $this->comments()->count();
    }
}
