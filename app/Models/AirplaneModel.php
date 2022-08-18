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
        return AirplaneFactory::class;
    }
    protected $table = 'airplanes';
}
