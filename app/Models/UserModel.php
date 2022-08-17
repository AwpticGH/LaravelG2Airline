<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;
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
}
