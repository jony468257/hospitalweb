<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineConsultation extends Model
{
    protected $fillable = [
        'doctor_id', 'patient_id', 'consult_date', 'status', 'fee', 'meeting_link'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
