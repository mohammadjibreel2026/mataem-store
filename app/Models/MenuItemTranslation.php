<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItemTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['menu_item_id','locale','title'];

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
