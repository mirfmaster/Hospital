<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'job_id';
    protected $table = 'jobs';
    protected $fillable = ['job_name', 'job_desc'];
    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
