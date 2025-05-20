<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'year']; // [cite: 8]

    /**
     * Mendapatkan semua data peminjaman untuk buku ini.
     */
    public function borrowings(): HasMany // Tentukan tipe return relationship
    {
        // Relasi: satu buku bisa memiliki banyak peminjaman
        return $this->hasMany(Borrowing::class);
    }
}