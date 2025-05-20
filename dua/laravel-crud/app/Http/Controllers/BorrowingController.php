<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book; // Import model Book
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Menampilkan daftar semua peminjaman.
     */
    public function index()
    {
        // Ambil data peminjaman beserta data buku terkait (menggunakan eager loading)
        $borrowings = Borrowing::with('book')->latest()->paginate(10); // Urutkan berdasarkan terbaru & paginasi
        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Menampilkan form untuk membuat peminjaman baru.
     */
    public function create()
    {
        // Ambil semua data buku untuk ditampilkan di dropdown
        $books = Book::orderBy('title')->get();
        return view('borrowings.create', compact('books'));
    }

    /**
     * Menyimpan data peminjaman baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id', // Pastikan book_id ada di tabel books
            'borrower_name' => 'required|string|max:255',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date', // Tanggal kembali tidak boleh sebelum tanggal pinjam
        ]);

        Borrowing::create($request->all());

        return redirect()->route('borrowings.index')
                        ->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu peminjaman.
     */
    public function show(Borrowing $borrowing)
    {
        // Load data buku terkait jika belum (meskipun di index sudah pakai eager loading)
        $borrowing->load('book');
        return view('borrowings.show', compact('borrowing'));
    }

    /**
     * Menampilkan form untuk mengedit data peminjaman.
     */
    public function edit(Borrowing $borrowing)
    {
        $books = Book::orderBy('title')->get(); // Ambil data buku
        $borrowing->load('book'); // Load data buku terkait
        return view('borrowings.edit', compact('borrowing', 'books'));
    }

    /**
     * Mengupdate data peminjaman di database.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
        ]);

        $borrowing->update($request->all());

        return redirect()->route('borrowings.index')
                        ->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Menghapus data peminjaman dari database.
     */
    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return redirect()->route('borrowings.index')
                        ->with('success', 'Data peminjaman berhasil dihapus.');
    }
}