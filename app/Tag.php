<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends Model
{
           use SoftDeletes;


    protected $dates = ['deleted_at'];

    protected $fillable = ['tag_id', 'article_id', 'name'];

    //protected $table = 'tags';



    public function articles()
    {


            return $this->belongsToMany('\App\Article');
    }


    public function getRouteKeyName()
    {

        return 'name';
    }
}
