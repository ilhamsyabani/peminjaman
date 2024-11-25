<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowers extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'no_id', 'photo', 'email', 'phone', 'address', 'status', 'information'];

    public function scopeSearch($query, $value, $label = null)
    {
        // Pencarian berdasarkan label atau di kolom `name` jika label tidak diberikan
        $query->where(function ($query) use ($value, $label) {
            if ($label === 'no_id') {
                $query->where("no_id", "like", "%{$value}%");
            } elseif ($label === 'email') {
                $query->where("email", "like", "%{$value}%");
            } else {
                // Default pencarian di kolom `name` jika tidak ada label yang diberikan
                $query->where("name", "like", "%{$value}%");
            }
        });
    }
}
