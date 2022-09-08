<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Session;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $data = Layanan::where('nama', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $data = Layanan::orderBy('id', 'desc')->paginate(11); // Pagination menampilkan 5 data
        }
       return view('layanan.index',compact('data'));
    }

    // public function layanan()
    // {
    //     $layanan =  Layanan::orderBy('created_at','DESC')
    //     ->where('id_layanan',5)
    //     ->get();
    //     return view('reader.ekonomi',compact('ekonomi')) ;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Layanan = new Layanan;
        $Layanan->nama = $request->nama;
        $Layanan->keterangan = $request->ket;
        $Layanan->status = 'aktif';
        $Layanan->tanggal = date('Y-m-d');
        $Layanan->save();
        if ($Layanan) {
            Session::flash('success','Sukses Tambah Data');
            return redirect()->route('layanan.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('layanan.index');
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
        $service = Layanan::orderBy('created_at','DESC')
                ->where('id_layanan',$id)
                ->get();
        return view('layanan.detail',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Layanan::find($id);
        return view('Layanan.edit',compact('data'));
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
        $Layanan = Layanan::find($id);
        $Layanan->nama = $request->nama;
        $Layanan->keterangan = $request->ket;
        $Layanan->status = $request->status;
        $Layanan->save();
        if ($Layanan) {
            Session::flash('success','Sukses Update Data');
            return redirect()->route('layanan.index');
        } else {
            Session::flash('success','Failed Update Data');
            return redirect()->route('layanan.index');
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
        $Layanan = Layanan::find($id);
        $Layanan->delete();
        if ($Layanan) {
            Session::flash('success','Sukses Delete Data');
            return redirect()->route('layanan.index');
        } else {
            Session::flash('success','Failed Delete Data');
            return redirect()->route('layanan.index');
        }
    }

    public function search(request $request)
    {
        $cari = $request->get('cari');
        $data = Layanan::where('nama','LIKE','%'.$cari.'%')->get();
        return view('layanan.index',compact('data'));

    }
}
