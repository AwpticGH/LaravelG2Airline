<?php

namespace App\Models;

use Database\Factories\AirplaneFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirplaneModel extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return AirplaneFactory::new();
    }
    public $timestamps = false;
    protected $table = 'airplanes';

    public function airline()
    {
        return $this->belongsTo(AirlineModel::class, 'airline_id', 'id');
    }

    public function flights()
    {
        return $this->morphMany(FlightModel::class, 'flights');
    }
}
