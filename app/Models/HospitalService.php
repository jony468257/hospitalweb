<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalService extends Model
{
    protected $fillable = ['hospital_id', 'name', 'price', 'description'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
