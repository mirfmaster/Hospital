<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hash;
class Patient extends Model
{
    protected $fillable=['username','name','birth_date','address','password'];
    protected $dates=['created_at','updated_at','deleted_at'];
}
