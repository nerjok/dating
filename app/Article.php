<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{

        use SoftDeletes;


    protected $dates = ['deleted_at'];

    protected $fillable = ['content', 'title', 'user_id'];

    public function tags()
    {


            return $this->belongsToMany('App\Tag');
    }
}
