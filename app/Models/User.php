<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users_table";
    protected $fillable = [
        'users_name',
        'users_father',
        'users_mother',
        'users_phone',
        'users_work',
        'users_email',
        'users_password',
        'users_img'
    ];

    public function verifyUser(): HasOne
    {
        return $this->hasOne(verify::class);
    }

    
}
