<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','brand_id','country_id','sku','price','sale_price','stock','is_featured','active'
    ];

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'offer_product');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
