<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['slug','active','starts_at','ends_at'];

    public function translations()
    {
        return $this->hasMany(OfferTranslation::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'offer_product');
    }
}
