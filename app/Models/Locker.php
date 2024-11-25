<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function items()
    {
        return $this->morphMany(Item::class, 'penyimpanan');
    }
}
