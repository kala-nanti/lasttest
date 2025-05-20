@extends('layouts.app') {{-- Menggunakan layout master yg sama [cite: 20] --}}

@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Manajemen Peminjaman Buku</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-success" href="{{ route('borrowings.create') }}"> Tambah Peminjaman</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success mt-3">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered mt-3">
    <tr>
        <th>ID</th>
        <th>Judul Buku</th>
        <th>Nama Peminjam</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Kembali</th>
        <th width="280px">Aksi</th>
    </tr>
    @forelse ($borrowings as $borrowing)
    <tr>
        <td>{{ $borrowing->id }}</td>
        {{-- Akses judul buku melalui relasi --}}
        <td>{{ $borrowing->book->title ?? 'Buku Tidak Ditemukan' }}</td>
        <td>{{ $borrowing->borrower_name }}</td>
        <td>{{ $borrowing->borrow_date }}</td>
        <td>{{ $borrowing->return_date ?? 'Belum Kembali' }}</td>
        <td>
            <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('borrowings.show', $borrowing->id) }}">Detail</a>
                <a class="btn btn-primary btn-sm" href="{{ route('borrowings.edit', $borrowing->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" class="text-center">Belum ada data peminjaman.</td>
    </tr>
    @endforelse
</table>

{{-- Tampilkan link pagination jika ada --}}
{!! $borrowings->links() !!}

@endsection