<?php

namespace App\Models;

use Database\Factories\FlightFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(RouteModel::class);
    }

    public function airplane()
    {
        return $this->hasOne(AirplaneModel::class);
    }

    public function reserved()
    {
        return $this->belongsTo(ReservationModel::class);
    }
}
