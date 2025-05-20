<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            // Foreign key ke tabel books
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->string('borrower_name'); // Nama peminjam
            $table->date('borrow_date'); // Tanggal pinjam
            $table->date('return_date')->nullable(); // Tanggal kembali (boleh kosong)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};