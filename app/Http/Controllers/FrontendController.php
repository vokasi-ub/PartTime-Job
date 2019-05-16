<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\PelamarModel;
use App\BadanUsahaModel;
use App\PekerjaanModel;
use \Auth;
use DB;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function indexJob(Request $request)
    {
        $table = "Tabel Pekerjaan";
        $data = PekerjaanModel::with(['badanUsaha','pelamar'])->when($request->keyword, function ($query) use ($request) {
            $query->where('posisi', 'like', "%{$request->keyword}%");
        })->get();
        return view('pages.front-end.lowongan-frontend', compact('table', 'data'));
    }

    public function indexBadanUsaha(Request $request)
    {
        $table = "Tabel Badan Usaha";
        $data_post = BadanUsahaModel::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_BadanUsaha', 'like', "%{$request->keyword}%");
        })->get();
        return view('pages.front-end.badanUsaha-frontend', compact('table', 'data_post'));
    }
    
    public function createApply(Request $request)
    {
       $post = new \App\PelamarModel;

       $id = $request->id_Pekerjaan;
       $query = PekerjaanModel::with(['badanUsaha','pelamar'])->where('id_Pekerjaan', $id)->get();

        foreach($query as $qry){
            $isi = $qry->id_BadanUsaha;
        }
        

        $post->id_Pekerjaan = $id;
        $post->id_BadanUsaha = $isi;
        $post->nama = $request->nama;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->alamat = $request->alamat; 

        $this->isValid($request);
        

        $foto = $request->file('foto');
        $ktp = $request->file('ktp');
        $skck = $request->file('skck');
        $ktm = $request->file('ktm');
        $sks = $request->file('sks');  

        $nama_foto = rand() . '.' . $foto->
            getClientOriginalExtension();
        $nama_ktp = rand() . '.' . $ktp->
            getClientOriginalExtension();
        $nama_skck = rand() . '.' . $skck->
            getClientOriginalExtension();
        $nama_ktm = rand() . '.' . $ktm->
            getClientOriginalExtension();
        $nama_sks = rand() . '.' . $sks->
            getClientOriginalExtension();


        $foto->move(public_path('images'), $nama_foto);
        $ktp->move(public_path('images'), $nama_ktp);
        $skck->move(public_path('images'), $nama_skck);
        $ktm->move(public_path('images'), $nama_ktm);
        $sks->move(public_path('images'), $nama_sks);

        $post->foto = $nama_foto;
        $post->ktp = $nama_ktp;
        $post->skck = $nama_skck;
        $post->ktm = $nama_ktm;
        $post->sks = $nama_sks;

        $post->save();
         return redirect('lowongan')->with('success', 'Lamaran Berhasil dikirim !, untuk info selanjutnya akan dikirim lewat email..');

    }

    public function isValid($request)
    {
        $this->validate($request,[
            'foto' => 'required|image|max:2048',
            'ktp' => 'required|image|max:2048',
            'skck' => 'required|image|max:2048',
            'ktm' => 'required|image|max:2048',
            'sks' => 'required|image|max:2048',
        ]);
    }

    public function formApply(Request $request, $id_Pekerjaan)
    {
        $post = PekerjaanModel::find($id_Pekerjaan);

        // $data_job = PekerjaanModel::with(['badanUsaha','pelamar'])->get();
        $data_usaha = PekerjaanModel::all();

        return view('pages.front-end.v_add_lamaran', compact('data_usaha','post'));

    }

}
