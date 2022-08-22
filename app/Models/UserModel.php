<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\SocialiteModel;

class UserModel extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'email_verified_at' => 'datetime',
    ];

    public function reservations()
    {
        return $this->morphMany(ReservationModel::class, 'reservations');
    }

    public function socialite()
    {
        return $this->hasOne(SocialiteModel::class, 'user_id', 'id');
    }
}
