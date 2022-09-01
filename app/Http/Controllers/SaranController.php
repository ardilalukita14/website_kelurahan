<?php

namespace App\Http\Controllers;

use App\Models\saran;
use Illuminate\Http\Request;
use Alert;

class SaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $saran = Saran::where('nama', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $saran = Saran::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('saran.index', compact('saran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        saran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
            'subjek' => $request->subjek
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saran = saran::find($id);
        return view('saran.show', compact('saran'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::success('Saran Berhasil Dihapus','Sukses'); 
        Saran::find($id)->delete();
        return redirect()->route('saran.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
    public function tampil(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian nama
            $saran = Saran::where('Nama', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $saran = Saran::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('saran.tampil', compact('saran'));
    }
}
