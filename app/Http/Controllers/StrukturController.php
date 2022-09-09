<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Alert;
use Session;

class StrukturController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $struktur = struktur::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $struktur = struktur::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('struktur.index', compact('struktur'));
    }

    public function structure() {
        $semua = struktur::orderBy('created_at','DESC')
                ->take(1)
                ->get();
        return view('struktur.main', compact('semua'));
    }

    public function create()
    {
        return view('struktur.create');
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

        $struktur = new struktur;
        $struktur->judul = $request->judul;
        $struktur->foto = $org;
        $struktur->save();
        if ($struktur) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('struktur.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('struktur.index');
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
        $struktur = struktur::find($id);
        return view('struktur.show', compact('struktur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $struktur = struktur::find($id);
        return view('struktur.edit',compact('struktur'));
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
            $struktur = struktur::find($id);
            $struktur->judul = $request->judul;
            $struktur->save();

           if ($struktur) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('struktur.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('struktur.index');
            }
        } else {
            $file = $request->file('foto');
            $org = $file->getClientOriginalName();
            $path = 'foto';
            $file->move($path,$org);

            $struktur= struktur::find($id);
            $struktur->judul = $request->judul;
            $struktur->foto = $org;
            $struktur->save();
            if ($struktur) {
                Session::flash('success','Sukses Update Data');
                return redirect()->route('struktur.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('struktur.index');
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
        Alert::success('struktur Berhasil Dihapus','Sukses'); 
        struktur::find($id)->delete();
        return redirect()->route('struktur.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
