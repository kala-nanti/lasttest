@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Daftar Produk Minimarket</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('books.create') }}">Tambah Barang</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Tombol Peminjaman di kanan bawah -->
    <a href="{{ route('borrowings.index') }}" 
         class="btn btn-warning position-fixed" 
             style="bottom: 20px; right: 20px; z-index: 1000;"> Pembelian </a>


    <table class="table table-bordered mt-3">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th width="250px">Aksi</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->year }}</td>
            <td>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('books.show', $book->id) }}">Detail</a>
                    <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection