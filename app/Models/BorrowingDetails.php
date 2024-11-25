<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowingDetails extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowingDetailsFactory> */
    use HasFactory;

    protected $fillable = ['borrowing_id', 'item_id', 'quantity', 'item_status'];

    public function borrowing()
    {
        return $this->belongsTo(Borrowings::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
