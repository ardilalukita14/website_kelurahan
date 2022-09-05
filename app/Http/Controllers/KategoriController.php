<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $data = Kategori::where('nama', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $data = Kategori::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
       return view('kategori.index',compact('data'));
    }

    public function kategori()
    {
        $category =  Kategori::orderBy('created_at','DESC')
        ->where('kategori_id',5)
        ->where('status','aktif')
        ->take(4)
        ->get();
        return view('reader.ekonomi',compact('ekonomi')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Kategori = new Kategori;
        $Kategori->nama = $request->nama;
        $Kategori->keterangan = $request->ket;
        $Kategori->status = 'aktif';
        $Kategori->tanggal = date('Y-m-d');
        $Kategori->save();
        if ($Kategori) {
            Session::flash('success','Sukses Tambah Data');
            return redirect()->route('kategori.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('kategori.index');
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
        $ekonom = Kategori::orderBy('created_at','DESC')
                ->where('berita_id',$id)
                ->where('status','aktif')
                ->get();
        return view('reader.detail',compact('news','semua','komen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('kategori.edit',compact('data'));
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
        $Kategori = Kategori::find($id);
        $Kategori->nama = $request->nama;
        $Kategori->keterangan = $request->ket;
        $Kategori->status = $request->status;
        $Kategori->save();
        if ($Kategori) {
            Session::flash('success','Sukses Update Data');
            return redirect()->route('kategori.index');
        } else {
            Session::flash('success','Failed Update Data');
            return redirect()->route('kategori.index');
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
        $Kategori = Kategori::find($id);
        $Kategori->delete();
        if ($Kategori) {
            Session::flash('success','Sukses Delete Data');
            return redirect()->route('kategori.index');
        } else {
            Session::flash('success','Failed Delete Data');
            return redirect()->route('kategori.index');
        }
    }

    public function search(request $request)
    {
        $cari = $request->get('cari');
        $data = Kategori::where('nama','LIKE','%'.$cari.'%')->get();
        return view('kategori.index',compact('data'));

    }
}
