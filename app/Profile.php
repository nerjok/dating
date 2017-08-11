<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Profile extends Model
{
      protected $dates = ['deleted_at'];

     // protected $age;

    protected $fillable = ['status', 'gender', 'lives', 'birthdate', 'photo', 'description', 'lookingFor', 'user_id', 'is_online'];





/**
* @param original value of database field
*
* @return changed value, evalueted age.
*/

public function getBirthDateAttribute($value)
{
   
        $age2 = Carbon::createFromFormat('Y-m-d',$value);
           $now = Carbon::now();

            $value= $age2->diffInYears($now);
          
$this->attributes['BirthDate2']=$value;

    return $value;
    
}

     /**
      * Get the route key for the model.
      *
      * @return string
      */
      public function getRouteKeyName()
      {
          return 'user_id';
      }

    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
