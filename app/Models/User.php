<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use SoftDeletes, HasRoles, Notifiable;
    protected $primaryKey = "id";
    protected $fillable = ['id', 'name', 'email', 'address', 'city', 'sex', 'salary', 'experience', 'specialization', 'contact', 'password'];
    protected $hidden = ['remember_token'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $guard = 'admin';
    protected $touches = ['patients'];

    public function patients()
    {
        return $this->belongsToMany('App\Models\Patient', 'diagnosis')
            ->withPivot('diagnose')
            ->withTimestamps();
    }
    public function prescriptions()
    {
        return $this->belongsToMany('App\Models\Patient', 'prescriptions')
            ->withPivot('medical_prescription', 'validity_period')
            ->withTimestamps();
    }
}

