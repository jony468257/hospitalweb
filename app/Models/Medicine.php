<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'brand_name', 'generic_name', 'company', 'dosage_form', 'strength', 'price'
    ];

    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'disease_medicine')->withTimestamps();
    }

    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class, 'pharmacy_medicines')
                    ->withPivot(['price', 'stock', 'discount'])
                    ->withTimestamps();
    }
}
