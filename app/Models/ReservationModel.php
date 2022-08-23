<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationModel extends Model
{
    use HasFactory;
    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'flight_id',
        'paid',
        'active',
    ];

    public function flight()
    {
        return $this->morphTo('reservations');
    }

    public function reservationInfo()
    {
        return $this->hasMany(ReservationInfoModel::class, 'reservation_id', 'id');
    }
}
