<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function admin() {
        $jumlah_user = DB::table('users')->count(); 
        $jumlah_saran = DB::table('saran')->count();
        $jumlah_komentar = DB::table('komentar')->count();
        $jumlah_berita = DB::table('berita')->count();
        $jumlah_pengumuman = DB::table('pengumuman')->count();
        $jumlah_kategori = DB::table('kategori')->count();
        $jumlah_pegawai = DB::table('pegawai')->count();
        return view('dashboard.index',  compact('jumlah_user', 'jumlah_saran', 'jumlah_komentar', 'jumlah_berita', 'jumlah_pengumuman',
                                                'jumlah_kategori', 'jumlah_pegawai'));
        
    }

    public function widgets() {
        return view('dashboard.widgets');
    }
}
