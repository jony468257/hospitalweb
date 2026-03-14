<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = [
        'user_id', 'name', 'slug', 'address', 'phone', 
        'license_no', 'thana_id', 'country_id', 'latitude', 'longitude'
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

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'pharmacy_medicines')
                    ->withPivot(['price', 'stock', 'discount'])
                    ->withTimestamps();
    }
}
