<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Alert;
use Session;

class VisiMisiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $visimisi = visimisi::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $visimisi = visimisi::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('visimisi.index', compact('visimisi'));
    }

    public function about() {
        $semua = visimisi::orderBy('created_at','DESC')
                ->take(1)
                ->get();
        return view('visimisi.visimisi', compact('semua'));
    }

    public function create()
    {
        return view('visimisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        visimisi::create([
            'judul' => $request->judul,
            'visi' => $request->visi,
            'misi' => $request->misi
        ]);

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visimisi = visimisi::find($id);
        return view('visimisi.show', compact('visimisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visimisi = visimisi::find($id);
        return view('visimisi.edit',compact('visimisi'));
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
            $visimisi = visimisi::find($id);
            $visimisi->judul = $request->judul;
            $visimisi->visi = $request->visi;
            $visimisi->misi = $request->misi;
            $visimisi->save();

           if ($visimisi) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('visimisi.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('visimisi.index');
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
        Alert::success('visimisi Berhasil Dihapus','Sukses'); 
        visimisi::find($id)->delete();
        return redirect()->route('visimisi.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
