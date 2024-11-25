<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location_id'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function lockers()
    {
        return $this->hasMany(Locker::class);
    }

    public function items()
    {
        return $this->morphMany(Item::class, 'penyimpanan');
    }
}
