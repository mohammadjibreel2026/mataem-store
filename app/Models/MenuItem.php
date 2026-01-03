<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id','parent_id','type','link','sort_order','active'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function translations()
    {
        return $this->hasMany(MenuItemTranslation::class);
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class,'parent_id');
    }
}
