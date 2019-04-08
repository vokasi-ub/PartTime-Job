<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Auth;
use App\BadanUsahaModel;

class CreateInstansiController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = BadanUsahaModel::all();
        $table = "Buat Profil Badan Usaha [INSTANSI]"; 
        return view("pages.back-end.badan-usaha.v_add_badanusaha", compact('table','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new \App\BadanUsahaModel;
        $id = \Auth::user()->id;

        $post->id = $id;
        $post->nama_Badanusaha = $request->nama_BadanUsaha;
        $post->alamat = $request->alamat;
        $post->nomor_Telp = $request->nomor_Telp;
        $post->website = $request->website;
        $post->tgl_Berdiri = $request->tgl_Berdiri;
        $post->email = $request->email;
        $post->social_Media = $request->social_Media;

        $post->save();
        return redirect('instansi');
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
        //
    }
}
