<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'drug_id';
    protected $fillable = ['drug_name', 'stocks', 'price', 'password', 'role'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $guard = 'admin';
}
