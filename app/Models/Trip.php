<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($trip) {
            foreach ($trip->trip_images as $image) {
                $imagePath = storage_path('app/public/' . $image->image);

                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
        });
    }


    public function packages()
    {
        return $this->belongsToMany(Package::class, 'trip_packages', 'trip_id', 'package_id')->withPivot('id', 'price', 'include', 'exclude', 'itinerary', 'notes')
            ->withTimestamps();
    }

    public function trip_images()
    {
        return $this->hasMany(TripImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
