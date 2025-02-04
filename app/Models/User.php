<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username', // Tambahkan username di sini
        'email',
        'password',
        'is_admin',
    ];

    /**
     * Periksa apakah user adalah admin.
     *
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        return $this->attributes['is_admin'] == 1;
    }
}
