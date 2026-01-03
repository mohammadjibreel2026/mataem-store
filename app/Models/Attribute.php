<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    public function translations()
    {
        return $this->hasMany(AttributeTranslation::class);
    }

    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }
}
