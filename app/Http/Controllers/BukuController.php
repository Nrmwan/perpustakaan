<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kbuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // untuk manggil data dari tabel lain
        // $nama-bebas = migrasi::with('nama yang di migrasi')->all();

        $dtbuku = buku::all();
        return view('admin.buku', compact('dtbuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // untuk nambah data (jangan lupa di compac)
        // $nama_bebas = moldels::all();
        $kategoris = kbuku::all();
        return view('admin.buku-tambah', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // buku::create([
        //     'judul' => $request->judul,
        //     'cover' => $request->cover,
        //     'penulis' => $request->penulis,
        //     // tambah id
        //     // 'nama_diphp' => $request->nama_kolom_ditable,
        //     'penerbit' => $request->penerbit,
        //     'tahunTerbit' => $request->tahunTerbit,

        // ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->judul . '-' . now()->timestamp . '-' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $buku = buku::create($request->all());
        $buku->kategories()->sync($request->kategori);
        return redirect('admin/buku')->with('status', 'Data berhasil di simpan');
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
        $buku = buku::findorfail($id);
        // $k = kbuku::findorfail($id);
        $kategoris = kbuku::all();

        return view('admin.buku-edit', compact('buku', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $bukuID)
    {
        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->judul . '-' . now()->timestamp . '-' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }


        $request['cover'] = $newName;
        $buku = buku::findorfail($bukuID);
        $buku->update($request->all());
        if ($request->kategories) {
            $buku->kategories()->sync($request->kategori);
        }

        return redirect('admin/buku')->with('status', 'Data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        buku::where('bukuID', $id)->delete();
        return redirect('admin/buku')->with('status', 'Data berhasil di hapus');
    }
}
