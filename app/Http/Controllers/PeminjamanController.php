<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\buku;
use App\Models\User;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p = peminjaman::with(['user', 'buku'])->get();
        return view('admin.data-peminjaman', compact('p'));
    }
    public function indexx()
    {
        $p = peminjaman::with(['user', 'buku'])->get();
        return view('admin.peminjaman', compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = User::all();
        $user = User::where('type', 0)->get();
        $buku = buku::all();
        return view('admin.peminjaman', compact('user', 'buku'));
    }
    public function mbalekke()
    {
        // $user = User::all();

        $user = User::where('type', 0)->get();
        $buku = buku::all();
        return view('admin.pengembalian', compact('user', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpen(Request $request)
    {
        $dtp = peminjaman::where('userID', $request->userID)->where('bukuID', $request->bukuID)->where('tanggalPengembalian', null);
        $pdt = $dtp->first();
        $tdp = $dtp->count();

        if ($tdp == 1) {
            $pdt->tanggalPengembalian = Carbon::now()->toDateString();
            $pdt->save();

            Session::flash('message', 'Pengembalian Buku berhasil');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/kembalikan');
        }
    }
    // public function store(Request $request)
    // {
    //     $request['tanggalPeminjaman'] = Carbon::now()->toDateString();
    //     $request['batasPengembalian'] = Carbon::now()->addDay(7)->toDateString();
    //     $buku = buku::findOrFail($request->bukuID);

    //     if ($buku->stok <= 0) {
    //         Session::flash('message', 'Maaf stok buku Habis');
    //         Session::flash('alert-class', 'alert-danger');
    //         return redirect('/admin/peminjam');
    //     } else {
    //         $count = peminjaman::where('userID', $request->userID)->where('batasPengembalian', null)->count();

    //         if ($count >= 3) {
    //             Session::flash('message', 'Maaf User sudah meninjam 3 buku');
    //             Session::flash('alert-class', 'alert-danger');
    //             return redirect('/admin/peminjam');
    //         } else {
    //             peminjaman::create($request->all());

    //             $buku = buku::findOrFail($request->bukuID);
    //             $buku->stok -= 1;
    //             $buku->save();

    //             Session::flash('message', 'Data berhasil disimpan');
    //             Session::flash('alert-class', 'alert-success');
    //             return redirect('/admin/peminjam');
    //         }
    //     }
    // }
    public function store(Request $request)
    {
        $request->validate([
            'userID' => 'required',
            'bukuID' => 'required',
        ]);

        $request['tanggalPeminjaman'] = Carbon::now()->toDateString();
        $request['batasPengembalian'] = Carbon::now()->addDay(7)->toDateString();
        $buku = buku::findOrFail($request->bukuID);

        if ($buku->stok <= 0) {
            return redirect('/admin/peminjam')->with('message', 'Maaf stok buku habis')->with('alert-class', 'alert-danger');
        }

        $count = peminjaman::where('userID', $request->userID)->where('batasPengembalian', null)->count();
        if ($count >= 3) {
            return redirect('/admin/peminjam')->with('message', 'Maaf User sudah meminjam 3 buku')->with('alert-class', 'alert-danger');
        }

        // Simpan peminjaman
        peminjaman::create($request->all());

        // Kurangi stok buku
        $buku->stok -= 1;
        $buku->save();

        return redirect('/admin/peminjam')->with('message', 'Data berhasil disimpan')->with('alert-class', 'alert-success');
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
