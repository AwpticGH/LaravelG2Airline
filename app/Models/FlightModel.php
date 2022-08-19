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

    public function flights()
    {
        return $this->morphTo('flights');
    }

    public function reservations()
    {
        return $this->morphMany(ReservationModel::class, 'reservations');
    }
}
