<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use SoftDeletes,HasRoles,Notifiable;
    protected $fillable=['name','email','address','city','sex','salary','experience','specialization','contact','password'];
    protected $hidden = ['remember_token'];
    protected $dates=['created_at','updated_at','deleted_at'];
    protected $guard='admin';

}
