<?php

namespace App\Models;

use Database\Factories\RouteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteModel extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return RouteFactory::new();
    }
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'routes';

    public function from()
    {
        return $this->belongsTo(AirportModel::class, 'departure_id', 'id');
    }

    public function to()
    {
        return $this->belongsTo(AirportModel::class, 'destination_id', 'id');
    }

    public function flights()
    {
        return $this->hasMany(FlightModel::class, 'route_id', 'id');
    }
}
