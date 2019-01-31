<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $primaryKey= 'job_id';
    protected $table ='jobs';
    protected $fillable= ['job_name','job_desc'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
