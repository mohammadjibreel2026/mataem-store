<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function translations()
    {
        return $this->hasMany(TagTranslation::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tag');
    }
}
