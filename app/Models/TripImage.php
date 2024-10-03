<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripImage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}
