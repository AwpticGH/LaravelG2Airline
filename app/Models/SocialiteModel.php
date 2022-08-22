<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;

class SocialiteModel extends Model
{
    use HasFactory;

    protected $table = 'socialites';

    protected $fillable = [
        'user_id',
        'google_id',
        'google_token',
        'google_refresh_token',
    ];

    protected $hidden = [
        'google_refresh_token',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
