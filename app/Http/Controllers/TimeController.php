<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Alert;
use Session;
use Validator;

class TimeController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $time = time::where('judul', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $time = time::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('time.index', compact('time'));
    }

    public function times() {
        $semua = time::orderBy('created_at','DESC')
                ->take(1)
                ->get();
        return view('time.main', compact('semua'));
    }

    public function create()
    {
        return view('time.create');
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

        $time = new time;
        $time->judul = $request->judul;
        $time->isi = $request->isi;
        $time->foto = $org;
        $time->save();
        if ($time) {
            Session::flash('success','Sukses Tambah Data'); 
            return redirect()->route('time.index');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('time.index');
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
        $time = time::find($id);
        return view('time.show', compact('time'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time = time::find($id);
        return view('time.edit',compact('time'));
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
            $time = time::find($id);
            $time->judul = $request->judul;
            $time->isi = $request->isi;
            $time->save();

           if ($time) {
            Session::flash('success','Sukses Update Data');
                return redirect()->route('time.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('time.index');
            }
        } else {
            $this->validate($request, [
                'file' => 'required|image|mimes:png,jpg,jpeg',
                'judul' => 'required',
                'isi' => 'required'
            ]);

            $file = $request->file('foto');
            $org = $file->getClientOriginalName();
            $path = 'foto';
            $file->move($path,$org);

            $time= time::find($id);
            $time->judul = $request->judul;
            $time->isi = $request->isi;
            $time->foto = $org;
            $time->save();
            if ($time) {
                Session::flash('success','Sukses Update Data');
                return redirect()->route('time.index');
            } else {
                Session::flash('success','Failed Update Data');
                return redirect()->route('time.index');
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
        Alert::success('time Berhasil Dihapus','Sukses'); 
        time::find($id)->delete();
        return redirect()->route('time.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
