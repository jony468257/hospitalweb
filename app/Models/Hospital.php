<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'user_id', 'name', 'slug', 'type', 'address', 'phone', 
        'thana_id', 'country_id', 'latitude', 'longitude', 'description'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_hospital')
                    ->withPivot('room_no')
                    ->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }

    public function reviews()
    {
        return $this->hasMany(HospitalReview::class);
    }
}
