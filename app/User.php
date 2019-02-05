<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    protected $fillable = ['name','address','email','password','role'];
    protected $hidden = ['password','remember_token'];
    protected $primaryKey="user_id";
    protected $dates=['created_at','updated_at','deleted_at'];

    public function job()
    {
        return $this->hasMany('App\Job');
    }

}
