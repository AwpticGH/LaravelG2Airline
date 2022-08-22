<?php

namespace App\Models;

use Database\Factories\FlightFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RouteModel;
use App\Models\AirplaneModel;
use App\Models\ReservationModel;
use App\Models\AirportModel;

class FlightModel extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return FlightFactory::new();
    }
    public $timestamps = false;
    protected $table = 'flights';

    public function route()
    {
        return $this->belongsTo(RouteModel::class, 'route_id', 'id');
    }

    public function airplane()
    {
        return $this->belongsTo(AirplaneModel::class, 'airplane_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(ReservationModel::class, 'reservation_id', 'id');
    }
}
