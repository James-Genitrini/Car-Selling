<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFeatures extends Model
{
    use HasFactory;

    protected $primaryKey = 'car_id';

    public $timestamps = false;

    protected $table = 'cars_features';

    protected $fillable = [
        'car_id',
        'abs',
        'air_conditioning',
        'power_windows',
        'power_door_locks',
        'cruise_control',
        'bluetooth_connectivity',
        'remote_start',
        'gps_navigation',
        'heater_seats',
        'climate_control',
        'rear_parking_sensors',
        'leather_seats'
    ];
}
