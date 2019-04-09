<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Auth;
use DB;
use App\BadanUsahaModel;

class InstansiController extends Controller
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
        $table = "Profil [INSTANSI]";
        $data = BadanUsahaModel::where('id', $id)->get();

        return view('pages.back-end.badan-usaha.badanusaha', compact('table','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_BadanUsaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_BadanUsaha)
    {
        $post = BadanUsahaModel::find($id_BadanUsaha);
        $table = "Edit Profil [INSTANSI]";
        return view('pages.back-end.badan-usaha.v_edit_badanusaha', compact('post', 'table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_BadanUsaha)
    {
        $post = BadanUsahaModel::find($id_BadanUsaha);
        $post->update($request->all());
        return redirect('instansi')->with('success', 'Kategori film telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_BadanUsaha)
    {
        //
    }
}
