<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\PekerjaanModel;
use App\BadanUsahaModel;
use \Auth;
use DB;

class PekerjaanController extends Controller
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
    public function index()
    {
        $table = "Tabel Pekerjaan";
        $data_job = PekerjaanModel::all();
        $data = DB::select('select * from badan_usaha inner join pekerjaan on badan_usaha.id_BadanUsaha = pekerjaan.id_BadanUsaha');
        return view('pages.pekerjaan.pekerjaan', compact('table','data_job', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = "Tambah Pekerjaan"; 
        $data_instansi = BadanUsahaModel::get();
        return view("pages.pekerjaan.v_add_pekerjaan", compact('table', 'data_instansi'));
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
        return redirect('job');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $table = "Edit Pekerjaan";
        return view('pages.pekerjaan.v_edit_pekerjaan', compact('post', 'table', 'data_job'));
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
        return redirect('job')->with('success', 'Kategori film telah diubah');
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

        return redirect('job')->with('success', 'Stock has been deleted Successfully');
    }

    
    /**
     * under this comment is for user only
     * FOR User Only || FOR User Only || FOR User Only
     * FOR User Only || FOR User Only || FOR User Only
     * 
     */


}
