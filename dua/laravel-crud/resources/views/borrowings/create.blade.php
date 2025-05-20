@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Tambah Peminjaman Baru</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" href="{{ route('borrowings.index') }}"> Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <strong>Error!</strong> Ada masalah dengan input Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('borrowings.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Buku:</strong>
                <select name="book_id" class="form-control">
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }} ({{ $book->author }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Nama Peminjam:</strong>
                <input type="text" name="borrower_name" class="form-control" placeholder="Nama Peminjam" value="{{ old('borrower_name') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Tanggal Pinjam:</strong>
                <input type="date" name="borrow_date" class="form-control" value="{{ old('borrow_date') }}">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Tanggal Kembali (Opsional):</strong>
                <input type="date" name="return_date" class="form-control" value="{{ old('return_date') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
@endsection