<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductComparison extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','product_id_1','product_id_2'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product1()
    {
        return $this->belongsTo(Product::class,'product_id_1');
    }

    public function product2()
    {
        return $this->belongsTo(Product::class,'product_id_2');
    }
}
