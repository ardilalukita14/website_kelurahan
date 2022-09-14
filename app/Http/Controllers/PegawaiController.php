<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Alert;
use Session;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $pegawai = pegawai::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $pegawai = pegawai::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('pegawai.index', compact('pegawai'));
    }

    public function pegawai() {
        $semua = pegawai::orderBy('created_at','ASC')
                ->get();
        return view('pegawai.main', compact('semua'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $pegawai = new pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->nip = $request->nip;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->keterangan = $request->keterangan;
        $pegawai->save();
        if ($pegawai) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('pegawai.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('pegawai.index');
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
        $pegawai = pegawai::find($id);
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = pegawai::find($id);
        return view('pegawai.edit',compact('pegawai'));
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
            $pegawai = Pegawai::find($id);
            $pegawai->nama = $request->nama;
            $pegawai->nip = $request->nip;
            $pegawai->jabatan = $request->jabatan;
            $pegawai->keterangan = $request->keterangan;
            $pegawai->save();

           if ($pegawai) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('pegawai.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('pegawai.index');
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
        Alert::success('pegawai Berhasil Dihapus','Sukses'); 
        pegawai::find($id)->delete();
        return redirect()->route('pegawai.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
