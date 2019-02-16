<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
class Patient extends Authenticatable
{
    protected $fillable=['username','name','birth_date','address','password','phone'];
    protected $dates=['created_at','updated_at','deleted_at'];
    protected $guard='web';
}
