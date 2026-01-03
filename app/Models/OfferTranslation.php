<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['offer_id','locale','title','description'];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
