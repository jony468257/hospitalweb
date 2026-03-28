<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalFeature extends Model
{
    protected $fillable = ['hospital_id', 'name', 'description'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
