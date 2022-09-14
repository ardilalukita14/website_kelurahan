<?php

namespace App\Http\Controllers;

use App\Models\pengumuman;
use Illuminate\Http\Request;
use Alert;
use Session;

class PengumumanController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $pengumuman = Pengumuman::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $pengumuman = Pengumuman::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('pengumuman.index', compact('pengumuman'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => $request->status,
            'tanggal' => date('Y-m-d')
        ]);

        return redirect('/pengumuman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengumuman = pengumuman::find($id);
        return view('pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('pengumuman.edit',compact('pengumuman'));
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
            $Pengumuman = Pengumuman::find($id);
            $Pengumuman->judul = $request->judul;
            $Pengumuman->isi = $request->isi;
            $Pengumuman->status =  $request->status;
            $Pengumuman->save();

           if ($Pengumuman) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('pengumuman.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('pengumuman.index');
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
        Alert::success('Pengumuman Berhasil Dihapus','Sukses'); 
        Pengumuman::find($id)->delete();
        return redirect()->route('pengumuman.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function tampil(Request $request)
    {
        $pengumuman =  Pengumuman::orderBy('created_at','DESC')
        ->where('status','aktif')
        ->where('tanggal', date('Y-m-d'))
        ->take(8)
        ->get();
        return view('pengumuman.tampil',compact('pengumuman'));
    }
}
