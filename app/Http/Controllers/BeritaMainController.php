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
        return view('berita',compact('semua')) ;
    }
        
}
