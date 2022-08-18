<?php

namespace App\Models;

use Database\Factories\AirportFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirportModel extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return AirportFactory::new();
    }
    public $timestamps = false;
    protected $table = 'airports';
}
