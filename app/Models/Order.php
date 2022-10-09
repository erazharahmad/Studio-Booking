<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'studio_id',
        'booking_start_date',
        'booking_end_date',
        'booking_start_time',
        'booking_end_time',
        'booking_amount',
        'booking_status'
    ];

    public function studio()
    {
        return $this->belongsTo('App\Models\Studio', 'studio_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
