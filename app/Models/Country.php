<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    public function translations()
    {
        return $this->hasMany(CountryTranslation::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
