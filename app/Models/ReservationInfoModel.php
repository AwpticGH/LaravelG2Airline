<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationInfoModel extends Model
{
    use HasFactory;
    protected $table = 'reservations_info';

    protected $fillable = [
        'reservation_id',
        'seat_class',
        'name',
        'gender',
        'title',
        'date_of_birth',
        'phone_number',
    ];

    public $timestamps = false;

    public function reservation()
    {
        return $this->belongsTo(ReservationModel::class, 'reservation_id', 'id');
    }
}
