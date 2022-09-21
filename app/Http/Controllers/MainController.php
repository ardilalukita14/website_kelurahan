<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Komentar;
use Session;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semua = Berita::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(3)
                ->get();
        $tops =  Berita::orderBy('created_at','DESC')
                    ->where('status','aktif')
                    ->where('top_news','aktif')
                    ->take(3)
                    ->get();
        $latest =  Berita::orderBy('created_at','DESC')
                    ->where('status','aktif')
                    ->where('tanggal', date('Y-m-d'))
                    ->take(3)
                    ->get();
        $pengumuman =  Pengumuman::orderBy('created_at','DESC')
                    ->where('status','aktif')
                    ->where('tanggal', date('Y-m-d'))
                    ->take(3)
                    ->get();
        return view('reader.index',compact('semua', 'tops', 'latest', 'pengumuman')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = Berita::find($id);
        $semua = Berita::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->where('tanggal', date('Y-m-d'))
                ->take(6)
                ->get();
        $komen = Komentar::orderBy('created_at','DESC')
                ->where('berita_id',$id)
                ->where('status','aktif')
                ->get();
        return view('reader.detail',compact('news','semua', 'komen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'email'     => 'required',
            'isi'   => 'required',
         ]);

        $komen = new Komentar;
        $komen->nama = $request->nama;
        $komen->email = $request->email;
        $komen->keterangan = $request->isi;
        $komen->tanggal = date('Y-m-d');
        $komen->status = 'aktif';
        $komen->berita_id = $id;
        $komen->save();

        if ($komen) {
            Session::flash('success','Komentar berhasil ditambahkan');
            return redirect()->back();
        } else {
            Session::flash('success','Komentar gagal ditambahkan');
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list($id)
    {
        $semua = Berita::orderBy('created_at','DESC')
                ->take(3)
                ->get();
        $news =  Berita::orderBy('created_at','DESC')
                ->where('id_kategori',$id)
                ->where('status','aktif')
                ->get();
        return view('reader.list',compact('semua','news')) ;
    }

    public function cari(Request $request)
    {
        $key = $request->get('cari');
        $news = Berita::where('judul','LIKE','%'.$key.'%')->get();
        $semua = Berita::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(3)
                ->get();
        return view('reader.list',compact('news','semua')) ;
    }
}
