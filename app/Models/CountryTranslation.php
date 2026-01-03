<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CountryTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['country_id','locale','name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
