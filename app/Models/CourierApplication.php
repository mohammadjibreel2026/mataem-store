<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourierApplication extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone','city','vehicle_type','status'];
}
