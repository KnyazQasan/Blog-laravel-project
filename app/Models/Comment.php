<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'commment';
    protected $guarded = [];

    public function newsName(){
        return $this->belongsTo('App\Models\News','news_id');
    }
}
