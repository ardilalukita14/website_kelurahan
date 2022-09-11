<?php

namespace App\Http\Controllers;

use App\Models\Maklumat;
use Illuminate\Http\Request;
use Alert;
use Session;

class MaklumatController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $maklumat = maklumat::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $maklumat = maklumat::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('maklumat.index', compact('maklumat'));
    }

    public function maklumat() {
        $semua = maklumat::orderBy('created_at','DESC')
                ->take(1)
                ->get();
        return view('maklumat.main', compact('semua'));
    }

    public function create()
    {
        return view('maklumat.create');
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

        $maklumat = new maklumat;
        $maklumat->judul = $request->judul;
        $maklumat->foto = $org;
        $maklumat->save();
        if ($maklumat) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('maklumat.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('maklumat.index');
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
        $maklumat = maklumat::find($id);
        return view('maklumat.show', compact('maklumat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maklumat = maklumat::find($id);
        return view('maklumat.edit',compact('maklumat'));
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
            $maklumat = maklumat::find($id);
            $maklumat->judul = $request->judul;
            $maklumat->save();

           if ($maklumat) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('maklumat.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('maklumat.index');
            }
        } else {
            $file = $request->file('foto');
            $org = $file->getClientOriginalName();
            $path = 'foto';
            $file->move($path,$org);

            $maklumat= maklumat::find($id);
            $maklumat->judul = $request->judul;
            $maklumat->foto = $org;
            $maklumat->save();
            if ($maklumat) {
                Session::flash('success','Sukses Update Data');
                return redirect()->route('maklumat.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('maklumat.index');
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
        Alert::success('maklumat Berhasil Dihapus','Sukses'); 
        maklumat::find($id)->delete();
        return redirect()->route('maklumat.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
