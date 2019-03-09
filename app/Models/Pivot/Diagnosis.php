<?php

namespace App\Models\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Diagnosis extends Pivot
{
    public function prescriptions()
    {
        return $this->hasOne('App\Models\Prescription', 'prescriptions');
    }
}
