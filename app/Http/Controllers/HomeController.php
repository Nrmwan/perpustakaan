<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\User;
use App\Models\kbuku;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        // Mengambil jumlah data dari tabel users

        $kategori = kbuku::all();
        $buku = buku::all();
        return view('user.home', compact('buku', 'kategori'));
    }

    public function nyileh()
    {
        // dd(Auth::user());
        $nyileh = peminjaman::with(['user', 'buku'])->where('userID', Auth::user()->id)->get();
        return view('user.peminjaman', compact('nyileh'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $user = User::count();
        $buku = buku::count();
        $peminjaman = peminjaman::count();
        return view('admin.home', compact('user', 'buku', 'peminjaman'));
    }

    
    // controll

    public function user()
    {
        // $dtuser = User::paginate(1);
        $dtuser = User::all();
        return view('admin.user', compact('dtuser'));
    }

    public function create()
    {
        return view('admin.user-tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        User::create([
            'userName' => $request->userName,
            'namaLengkap' => $request->namaLengkap,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => $request->password,
            'type' => $request->type,

        ]);
        return redirect('admin/user');
    }

    public function edit(Request $request, $id)
    {
        // $user = User::find($id);
        // $user->update($request->all());

        $user = User::findorfail($id);

        return view('admin.user-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $user = User::find($id);
        $user = User::findorfail($id);
        $user->update($request->all());

        return redirect('admin/user');
    }

    public function destroy(string $id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return back();
    }
}
