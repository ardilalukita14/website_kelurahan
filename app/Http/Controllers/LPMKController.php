<?php

namespace App\Http\Controllers;

use App\Models\lpmk;
use Illuminate\Http\Request;
use Alert;
use Session;

class lpmkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $lpmk = lpmk::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $lpmk = lpmk::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('lpmk.index', compact('lpmk'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lpmk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $lpmk= new lpmk;
       $lpmk->judul = $request->judul;
       $lpmk->isi = $request->isi;
       $lpmk->save();
        if ($lpmk) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('lpmk.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('lpmk.index');
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
        $lpmk= lpmk::find($id);
        return view('lpmk.show', compact('lpmk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lpmk= lpmk::find($id);
        return view('lpmk.edit',compact('lpmk'));
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
            $lpmk= lpmk::find($id);
           $lpmk->judul = $request->judul;
           $lpmk->isi = $request->isi;
           $lpmk->save();

           if ($lpmk) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('lpmk.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('lpmk.index');
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
        lpmk::find($id)->delete();
        return redirect()->route('lpmk.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
