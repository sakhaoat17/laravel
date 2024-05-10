<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'boat_id',
        'title',
        'location',
        'body_of_water',
        'captained',
        'make',
        'model',
        'image1',
        'image2',
        'year',
        'length',
        'passengers'
    ];

    // Relationships
    public function boat()
    {
        return $this->belongsTo(Boat::class);
    }
}
