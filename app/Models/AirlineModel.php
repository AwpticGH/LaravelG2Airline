<?php

namespace App\Models;

use Database\Factories\AirlineFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirlineModel extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return AirlineFactory::class;
    }
    protected $table = 'airlines';
}
