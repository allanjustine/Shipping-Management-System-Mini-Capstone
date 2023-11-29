<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
