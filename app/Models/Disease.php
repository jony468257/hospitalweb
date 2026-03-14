<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'causes', 'prevention'];

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class, 'disease_symptom')->withTimestamps();
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'disease_medicine')->withTimestamps();
    }
}
