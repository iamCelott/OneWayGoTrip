<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'trip_packages', 'trip_id', 'package_id')->withPivot('price', 'include', 'exclude', 'destination', 'notes')
            ->withTimestamps();
    }
}
