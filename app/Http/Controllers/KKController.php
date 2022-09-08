<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use Alert;
use Session;

class KKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $kk = kartukeluarga::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $kk = kartukeluarga::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('kartukeluarga.index', compact('kk'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kartukeluarga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kk = new kartukeluarga;
        $kk->judul = $request->judul;
        $kk->isi = $request->isi;
        $kk->save();
        if ($kk) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('kartukeluarga.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('kartukeluarga.index');
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
        $kk = kartukeluarga::find($id);
        return view('kartukeluarga.show', compact('kk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kk = kartukeluarga::find($id);
        return view('kartukeluarga.edit',compact('kk'));
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
            $kk = kartukeluarga::find($id);
            $kk->judul = $request->judul;
            $kk->isi = $request->isi;
            $kk->save();

           if ($kk) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('kartukeluarga.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('kartukeluarga.index');
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
        Alert::success('Syarat Pembuatan KK Berhasil Dihapus','Sukses'); 
        kartukeluarga::find($id)->delete();
        return redirect()->route('kartukeluarga.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
