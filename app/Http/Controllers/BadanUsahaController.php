<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\BadanUsahaModel;

class BadanUsahaController extends Controller
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
        $table = "Tabel Badan Usaha";
        $data_post = BadanUsahaModel::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_BadanUsaha', 'like', "%{$request->keyword}%");
        })->get();
        return view('pages.badan-usaha.badanusaha', compact('table', 'data_post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = "Tambah Badan Usaha"; 
        return view("pages.badan-usaha.v_add_badanusaha", compact('table'));
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

        $post->nama_Badanusaha = $request->nama_BadanUsaha;
        $post->alamat = $request->alamat;
        $post->nomor_Telp = $request->nomor_Telp;
        $post->website = $request->website;
        $post->tgl_Berdiri = $request->tgl_Berdiri;
        $post->email = $request->email;
        $post->social_Media = $request->social_Media;

        $post->save();
        return redirect('badan-usaha');
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
    public function edit($id_BadanUsaha)
    {
        $post = BadanUsahaModel::find($id_BadanUsaha);
        $table = "Edit Kategori Film";
        return view('pages.badan-usaha.v_edit_badanusaha', compact('post', 'table'));
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
        return redirect('badan-usaha')->with('success', 'Kategori film telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_BadanUsaha)
    {
        $post = BadanUsahaModel::find($id_BadanUsaha);
        $post->delete();

        return redirect('badan-usaha')->with('success', 'Stock has been deleted Successfully');
    }

}
