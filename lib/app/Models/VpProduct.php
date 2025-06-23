<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VpFavouriteProduct;

class VpProduct extends Model
{
    use HasFactory;
    protected $primaryKey = 'prod_id';
    protected $guarded = [];

    public function favorite()
    {
        return $this->hasMany(VpFavouriteProduct::class, 'favou_product', 'prod_id');
    }
}
