<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected static function newFactory()
    {
        return UserFactory::new();
    }
    protected $table = 'users';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'gender',
        'title',
        'date_of_birth',
        'phone_number',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'DateOfBirth' => 'date'
    ];

    public function reservations()
    {
        return $this->morphMany(ReservationModel::class, 'reservations');
    }
}
