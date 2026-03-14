<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacyMedicine extends Model
{
    protected $fillable = [
        'pharmacy_id', 'medicine_id', 'price', 'stock', 'discount'
    ];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
