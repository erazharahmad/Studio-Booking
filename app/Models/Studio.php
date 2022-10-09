<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;
    protected $fillable = [
        'studio_name',
        'description',
        'location',
        'opening_time',
        'closing_time',
        'studio_image',
        'charges'
    ];

}
