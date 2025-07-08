@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Barang</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $barang->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $barang->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" value="{{ $barang->stok }}" required>
        </div>

        {{-- Gambar Saat Ini --}}
        @if ($barang->gambar)
            <div class="mb-3">
                <label>Gambar Saat Ini:</label><br>
                <img src="{{ asset('gambar_barang/' . $barang->gambar) }}" width="150">
            </div>
        @endif

        {{-- Gambar Baru --}}
        <div class="mb-3">
            <label>Ganti Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection