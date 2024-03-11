<?php

namespace App\Http\Controllers;


use App\Models\kbuku;
use Illuminate\Http\Request;

class KbukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // untuk manggil data dari tabel lain
        // $nama-bebas = migrasi::with('nama yang di migrasi')->all();

        $k = kbuku::all();
        return view('admin.kategori', compact('k'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // untuk nambah data (jangan lupa di compac)
        // $nama_bebas = moldels::all();
        return view('admin.kategori-tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'requireq|unique:kategoribuku|max:255',
        ]);

        kbuku::create([
            'namaKategori' => $request->namaKategori,
        ]);
        return redirect('admin/kategori')->with('status', 'Data updated!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        // untuk nambah data (jangan lupa di compac)
        // $nama_bebas = moldels::with('nama-kolom')all();
        $k = kbuku::findorfail($id);

        return view('admin.kategori-edit', compact('k'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kategoriID)
    {
        $k = kbuku::findorfail($kategoriID);
        $k->update($request->all());

        return redirect('admin/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kbuku = kbuku::findorfail($id);
        $kbuku->delete();
        return back()->with('delete', 'Data Berhasil Di Hapus!');
    }
}
