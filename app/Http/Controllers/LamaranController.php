<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\PelamarModel;
use \Auth;
use DB;

class LamaranController extends Controller
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
        $id = \Auth::user()->id;
        $data = DB::select('select * from badan_usaha inner join pekerjaan on badan_usaha.id_BadanUsaha = pekerjaan.id_BadanUsaha inner join lamaran on pekerjaan.id_Pekerjaan = lamaran.id_Pekerjaan where badan_usaha.id =?',[$id]);
        $data_pelamar = PelamarModel::all();
        $table = "Tabel Pelamar [INSTANSI]";
        return view('pages.back-end.pelamar.pelamar', compact('table', 'data_pelamar', 'data'));
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
    public function show($id_Lamaran)
    {
        $data_pelamar = PelamarModel::find($id_Lamaran); 
        $table = "Data Pelamar [INSTANSI]";
        return view('pages.back-end.pelamar.v_data_pelamar', compact('table', 'data_pelamar'));
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
