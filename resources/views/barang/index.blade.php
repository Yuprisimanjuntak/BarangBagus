@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">📦 Daftar Barang</h2>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol Tambah --}}
        <a href="{{ route('barang.create') }}" class="btn btn-success mb-3">+ Tambah Barang</a>

        {{-- Tabel Barang --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td class="text-center">{{ $item->stok }}</td>
                            <td class="text-center">
                                @if ($item->gambar)
                                    <img src="{{ asset('gambar_barang/' . $item->gambar) }}" width="70">
                                @else
                                    <em>Tidak ada</em>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
v