<?php

namespace App\Http\Controllers;

use App\Models\kartupenduduk;
use Illuminate\Http\Request;
use Alert;
use Session;

class KTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $ktp = kartupenduduk::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $ktp = kartupenduduk::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('kartupenduduk.index', compact('ktp'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kartupenduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $ktp= new kartupenduduk;
       $ktp->judul = $request->judul;
       $ktp->isi = $request->isi;
       $ktp->save();
        if ($ktp) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('kartupenduduk.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('kartupenduduk.index');
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
        $ktp= kartupenduduk::find($id);
        return view('kartupenduduk.show', compact('ktp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ktp= kartupenduduk::find($id);
        return view('kartupenduduk.edit',compact('ktp'));
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
            $ktp= kartupenduduk::find($id);
           $ktp->judul = $request->judul;
           $ktp->isi = $request->isi;
           $ktp->save();

           if ($ktp) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('kartupenduduk.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('kartupenduduk.index');
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
        kartupenduduk::find($id)->delete();
        return redirect()->route('kartupenduduk.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
