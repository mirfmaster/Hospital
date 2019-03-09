<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescriptions';

    public function diagnosis()
    {
        return $this->belongsTo('App\Models\Pivot\Diagnosis', 'diagnosis')
            ->withPivot('medical_prescription', 'validity_period')
            ->withTimestamps();
    }
}
