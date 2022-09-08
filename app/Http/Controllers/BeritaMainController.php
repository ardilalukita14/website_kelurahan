<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Session;


class BeritaMainController extends Controller
{
    public function index()
    {
        $semua = Berita::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->get();
        return view('berita',compact('semua'));
    }

    public function kamtibmas() {
        $kamtibmas =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',1)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/kamtibmas',compact('kamtibmas'));
}

    public function kesehatan() {
        $kesehatan =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',2)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/kesehatan',compact('kesehatan'));
}

    public function pariwisata() {
        $pariwisata =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',3)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/pariwisata',compact('pariwisata'));
}
       
    public function pendidikan() {
        $pendidikan =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',4)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/pendidikan',compact('pendidikan'));
}
    
    public function ekonomi() {
        $ekonomi =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',4)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
    return view('berita/ekonomi',compact('ekonomi'));
}

    public function pernak() {                
        $pernak =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',5)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/pernak',compact('pernak'));
}

    public function pkk() {   
        $pkk=  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',6)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/pkk',compact('pkk'));
}

    public function lpmk() { 

        $lpmk =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',7)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/lpmk',compact('lpmk'));
}

    public function umkm() { 

        $umkm =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',8)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/umkm',compact('umkm'));
}

    public function bkm() { 
                
        $bkm =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',9)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/bkm',compact('bkm'));
}

    public function fkk() { 
                
        $fkk =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',10)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/fkk',compact('fkk'));
}

    public function karta() { 
        $karta =  Berita::orderBy('created_at','DESC')
                    ->where('id_kategori',11)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        return view('berita/karta',compact('karta'));
}
        
}
