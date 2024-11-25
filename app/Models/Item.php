<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

     protected $fillable = [
        'official_code',
        'code',
        'name',
        'amount',
        'category_id',
        'location_id',
        'location_type',  // Mengacu ke lokasi, ruang, atau loker
        'condition',
        'status',
        'description',
        'purchase_id',
    ];

    // Relasi ke model Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relasi ke model Purchase
    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }

    // Relasi polimorfik ke model penyimpanan (Location, Room, Locker)
    public function penyimpanan()
    {
        return $this->morphTo();
    }

    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function scopeSearch($query, $value)
    {
        // Pencarian berdasarkan beberapa kolom
        $query->where(function ($query) use ($value) {
            $query->where("name", "like", "%{$value}%")
                  ->orWhere("code", "like", "%{$value}%")
                  ->orWhere("official_code", "like", "%{$value}%");
        });
    }
    
}
