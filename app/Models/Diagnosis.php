<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable= ['job_name','job_desc'];
    public function user()
    {
        return $this->belongsToMany(App\Models\User::class);
    }
}
