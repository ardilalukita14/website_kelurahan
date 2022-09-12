<?php

namespace App\Http\Controllers;

use App\Models\Tupoksi;
use Illuminate\Http\Request;
use Alert;
use Session;

class TupoksiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $tupoksi = tupoksi::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $tupoksi = tupoksi::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('tupoksi.index', compact('tupoksi'));
    }

    public function tupoksi() {
        $semua = tupoksi::orderBy('created_at','DESC')
                ->take(1)
                ->get();
        return view('tupoksi.main', compact('semua'));
    }

    public function create()
    {
        return view('tupoksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
        $org = $file->getClientOriginalName();
        $path = 'foto';
        $file->move($path,$org);

        $tupoksi = new tupoksi;
        $tupoksi->judul = $request->judul;
        $tupoksi->isi = $request->isi;
        $tupoksi->foto = $org;
        $tupoksi->save();
        if ($tupoksi) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('tupoksi.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('tupoksi.index');
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
        $tupoksi = tupoksi::find($id);
        return view('tupoksi.show', compact('tupoksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tupoksi = tupoksi::find($id);
        return view('tupoksi.edit',compact('tupoksi'));
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
        $foto = $request->file('foto');
        if ($foto == "") {
            $tupoksi = tupoksi::find($id);
            $tupoksi->judul = $request->judul;
            $tupoksi->isi = $request->isi;
            $tupoksi->save();

           if ($tupoksi) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('tupoksi.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('tupoksi.index');
            }
        } else {
            $file = $request->file('foto');
            $org = $file->getClientOriginalName();
            $path = 'foto';
            $file->move($path,$org);

            $tupoksi= tupoksi::find($id);
            $tupoksi->judul = $request->judul;
            $tupoksi->isi = $request->isi;
            $tupoksi->foto = $org;
            $tupoksi->save();
            if ($tupoksi) {
                Session::flash('success','Sukses Update Data');
                return redirect()->route('tupoksi.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('tupoksi.index');
            }
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
        Alert::success('tupoksi Berhasil Dihapus','Sukses'); 
        tupoksi::find($id)->delete();
        return redirect()->route('tupoksi.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
