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
    protected $table = 'routes';
}
