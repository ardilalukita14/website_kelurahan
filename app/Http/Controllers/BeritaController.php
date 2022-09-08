<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\User;
use Session;


class BeritaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $data = Berita::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $data = Berita::orderBy('id', 'desc')->paginate(10); // Pagination menampilkan 5 data
        }
        $user=User::all();
        return view('main.berita',compact('data', 'user'));
    }

    public function cari(Request $request)
    {
        $key = $request->get('cari');
        $data = Berita::where('judul','LIKE','%'.$key.'%')->get();
        return view('main.berita',compact('data')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Kategori::all();
        $user=User::all();
        return view('main.create',compact('data', 'user'));
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

        $Berita = new Berita;
        $Berita->id_kategori = $request->kategori;
        $Berita->judul = $request->judul;
        $Berita->author = $request->author;
        $Berita->tanggal = date('Y-m-d');
        $Berita->isi = $request->isi;
        $Berita->foto = $org;
        $Berita->top_news = 'tidak aktif';
        $Berita->status = 'aktif' ;
        $Berita->save();
        if ($Berita) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('main.berita');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('main.berita');
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
        $data = Berita::find($id);
        return view('main.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kategori::all();
        $berita = Berita::find($id);
        return view('main.edit',compact('data','berita'));
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
            $Berita = Berita::find($id);
            $Berita->id_kategori = $request->kategori;
            $Berita->judul = $request->judul;
            $Berita->author = $request->author;
            $Berita->isi = $request->isi;
            $Berita->top_news =  $request->news;
            $Berita->status =  $request->status;
            $Berita->save();

           if ($Berita) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('main.berita');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('main.berita');
            }
        } else {
            $file = $request->file('foto');
            $org = $file->getClientOriginalName();
            $path = 'foto';
            $file->move($path,$org);

            $Berita = Berita::find($id) ;
            $Berita->id_kategori = $request->kategori;
            $Berita->judul = $request->judul;
            $Berita->author = $request->author;
            $Berita->isi = $request->isi;
            $Berita->foto = $org;
            $Berita->top_news =  $request->news;
            $Berita->status =  $request->status;
            $Berita->save();
            if ($Berita) {
                Session::flash('success','Sukses Update Data');
                return redirect()->route('main.berita');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('main.berita');
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
        $Berita = Berita::find($id);
        $Berita->delete();
         if ($Berita) {
            Session::flash('success','Sukses Hapus Data'); 
            return redirect()->route('main.berita');
        } else {
            Session::flash('Berita Gagal Dihapus','Gagal');
            return redirect()->route('main.berita');
        }

    }

}
