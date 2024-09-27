<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'trip_packages', 'package_id', 'trip_id')->withPivot('price', 'include', 'exclude', 'destination', 'notes')
            ->withTimestamps();
    }
}
