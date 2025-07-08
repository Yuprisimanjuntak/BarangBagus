<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'stok' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('nama', 'deskripsi', 'stok');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('gambar_barang'), $filename);
            $data['gambar'] = $filename;
        }

        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'stok' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $barang->nama = $request->nama;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok = $request->stok;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar && file_exists(public_path('gambar_barang/' . $barang->gambar))) {
                unlink(public_path('gambar_barang/' . $barang->gambar));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('gambar_barang'), $filename);
            $barang->gambar = $filename;
        }

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(Barang $barang)
    {
        // Hapus gambar jika ada
        if ($barang->gambar && file_exists(public_path('gambar_barang/' . $barang->gambar))) {
            unlink(public_path('gambar_barang/' . $barang->gambar));
        }

        // Hapus data
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
