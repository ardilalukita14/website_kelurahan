<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Layanan;
use Session;


class ContentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $data = Content::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $data = Content::orderBy('id', 'desc')->paginate(10); // Pagination menampilkan 5 data
        }
        return view('content.index',compact('data'));
    }

    public function cari(Request $request)
    {
        $key = $request->get('cari');
        $data = Content::where('judul','LIKE','%'.$key.'%')->get();
        return view('content.index',compact('data')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Layanan::all();
        return view('content.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Content = new Content;
        $Content->id_layanan = $request->layanan;
        $Content->judul = $request->judul;
        $Content->isi = $request->isi;
        $Content->save();
        if ($Content) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('content.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('contenindex');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Content::find($id);
        return view('content.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Layanan::all();
        $content = Content::find($id);
        return view('content.edit',compact('data','content'));
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
        
            $Content = Content::find($id) ;
            $Content->id_layanan = $request->layanan;
            $Content->judul = $request->judul;
            $Content->isi = $request->isi;
            $Content->save();
            if ($Content) {
                Session::flash('success','Sukses Update Data');
                return redirect()->route('content.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('content.index');
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
        $Content = Content::find($id);
        $Content->delete();
         if ($Content) {
            Session::flash('success','Sukses Hapus Data'); 
            return redirect()->route('content.index');
        } else {
            Session::flash('Content Gagal Dihapus','Gagal');
            return redirect()->route('content.index');
        }

    }

}
