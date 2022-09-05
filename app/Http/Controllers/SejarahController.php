<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Alert;
use Session;

class SejarahController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $sejarah = sejarah::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $sejarah = sejarah::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('sejarah.index', compact('sejarah'));
    }

    public function history() {
        $semua = sejarah::orderBy('created_at','DESC')
                ->take(1)
                ->get();
        return view('sejarah.main', compact('semua'));
    }

    public function create()
    {
        return view('sejarah.create');
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

        $sejarah = new sejarah;
        $sejarah->judul = $request->judul;
        $sejarah->isi = $request->isi;
        $sejarah->foto = $org;
        $sejarah->save();
        if ($sejarah) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('sejarah.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('sejarah.index');
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
        $sejarah = sejarah::find($id);
        return view('sejarah.show', compact('sejarah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sejarah = sejarah::find($id);
        return view('sejarah.edit',compact('sejarah'));
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
            $sejarah = sejarah::find($id);
            $sejarah->judul = $request->judul;
            $sejarah->isi = $request->isi;
            $sejarah->save();

           if ($sejarah) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('sejarah.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('sejarah.index');
            }
        } else {
            $file = $request->file('foto');
            $org = $file->getClientOriginalName();
            $path = 'foto';
            $file->move($path,$org);

            $sejarah= sejarah::find($id);
            $sejarah->judul = $request->judul;
            $sejarah->isi = $request->isi;
            $sejarah->foto = $org;
            $sejarah->save();
            if ($sejarah) {
                Session::flash('success','Sukses Update Data');
                return redirect()->route('sejarah.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('sejarah.index');
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
        Alert::success('sejarah Berhasil Dihapus','Sukses'); 
        sejarah::find($id)->delete();
        return redirect()->route('sejarah.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
