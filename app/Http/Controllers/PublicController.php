<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kbuku;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = kbuku::all();
        if ($request->kategori || $request->judul) {
            $buku = buku::where('judul', 'like', '%' . $request->judul . '%')
                ->orWhereHas('kategories', function ($k) use ($request) {
                    $k->where('kategoribuku_relasi.kategoriBukuID', $request->kategori);
                })
                ->get();
        } else {
            $buku = buku::all();
        }

        return view('home_gues', compact('buku', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
