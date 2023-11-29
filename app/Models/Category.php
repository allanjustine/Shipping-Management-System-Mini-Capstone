<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $casts = [
    //     'ship_image' => 'array',
    // ];

    public function ships()
    {
        return $this->hasMany(Ship::class);
    }
}
