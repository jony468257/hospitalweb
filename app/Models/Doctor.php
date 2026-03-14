<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id', 'name', 'slug', 'specialization', 'degree', 'experience_year', 'bio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'doctor_hospital')
                    ->withPivot('room_no')
                    ->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }

    public function consultations()
    {
        return $this->hasMany(OnlineConsultation::class);
    }

    public function reviews()
    {
        return $this->hasMany(DoctorReview::class);
    }
}
