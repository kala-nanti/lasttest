<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'borrower_name',
        'borrow_date',
        'return_date',
    ];

    /**
     * Mendapatkan buku yang terkait dengan peminjaman.
     */
    public function book(): BelongsTo // Tentukan tipe return relationship
    {
        // Relasi: satu peminjaman hanya milik satu buku
        return $this->belongsTo(Book::class);
    }
}