@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2> Detail Peminjaman</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" href="{{ route('borrowings.index') }}"> Kembali</a>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>ID Peminjaman:</strong>
            {{ $borrowing->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>Judul Buku:</strong>
            {{ $borrowing->book->title ?? 'N/A' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>Penulis Buku:</strong>
            {{ $borrowing->book->author ?? 'N/A' }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>Nama Peminjam:</strong>
            {{ $borrowing->borrower_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>Tanggal Pinjam:</strong>
            {{ $borrowing->borrow_date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>Tanggal Kembali:</strong>
            {{ $borrowing->return_date ?? 'Belum Dikembalikan' }}
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>Dibuat Pada:</strong>
            {{ $borrowing->created_at }}
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>Diperbarui Pada:</strong>
            {{ $borrowing->updated_at }}
        </div>
    </div>
</div>
@endsection