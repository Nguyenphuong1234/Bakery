<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VpProduct;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class VpUser extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'vp_users';

    protected $fillable = [
        'email',
        'password',
        'level',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favoriteProducts()
    {
        return $this->belongsToMany(VpProduct::class, 'vp_favourite_products', 'user_id', 'favou_product');
    }
}
