<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowings extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowingsFactory> */
    use HasFactory;


    protected $fillable = ['borrower_id', 'borrowing_date', 'return_date', 'status'];

    public function borrower()
    {
        return $this->belongsTo(Borrowers::class);
    }

    public function details()
    {
        return $this->hasMany(BorrowingDetails::class);
    }
}
