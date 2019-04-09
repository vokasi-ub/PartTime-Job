<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\PekerjaanModel;
use App\BadanUsahaModel;
use \Auth;
use DB;

class LowonganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = \Auth::user()->id;
        $table = "Tabel Pekerjaan [INSTANSI]";
        $data = PekerjaanModel::with(['badanUsaha','pelamar'])->when($request->keyword, function ($query) use ($request) {
            $query->where('posisi', 'like', "%{$request->keyword}%");
        })->get()->where('badanUsaha.id',$id);

        return view('pages.back-end.pekerjaan.pekerjaan', compact('table','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = \Auth::user()->id;
        $table = "Tambah Pekerjaan [INSTANSI]"; 
        $data_instansi = DB::select('select * from badan_usaha where id =?', [$id]);
        return view("pages.back-end.pekerjaan.v_add_pekerjaan", compact('table', 'data_instansi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new \App\PekerjaanModel;

        $post->id_BadanUsaha = $request->id_BadanUsaha;
        $post->posisi = $request->posisi;
        $post->jam_Kerja = $request->jam_Kerja;
        $post->persyaratan = $request->persyaratan;

        $post->save();
        return redirect('jobHole');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_Pekerjaan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_Pekerjaan)
    {
        $data_job = PekerjaanModel::find($id_Pekerjaan);
        $post = BadanUsahaModel::get(); 
        $table = "Edit Pekerjaan [INSTANSI]";
        return view('pages.back-end.pekerjaan.v_edit_pekerjaan', compact('post', 'table', 'data_job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_Pekerjaan)
    {
        $post = PekerjaanModel::find($id_Pekerjaan);
        $post->update($request->all());
        return redirect('jobHole')->with('success', 'Kategori film telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Pekerjaan)
    {
        $post = PekerjaanModel::find($id_Pekerjaan);
        $post->delete();

        return redirect('jobHole')->with('success', 'Stock has been deleted Successfully');
    }
}
