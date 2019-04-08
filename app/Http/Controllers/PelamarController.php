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

class PelamarController extends Controller
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
        $data_pelamar = PelamarModel::all();
        $table = "Tabel Pelamar";
        
        $data = BadanUsahaModel::join('pekerjaan', 'badan_usaha.id_BadanUsaha', '=', 'pekerjaan.id_BadanUsaha')
        ->join('lamaran', 'pekerjaan.id_Pekerjaan', '=', 'lamaran.id_Pekerjaan')          
        ->select('badan_usaha.*','pekerjaan.posisi', 'lamaran.*')
        ->when($request->keyword, function ($query) use ($request) {
        $query->where('nama', 'LIKE', "%{$request->keyword}%")
                ->orWhere('nama_BadanUsaha', 'LIKE', "%{$request->keyword}%")
                ->orWhere('posisi', 'LIKE', "%{$request->keyword}%");
        })->paginate(8);
        $data->appends($request->only('keyword'));

        return view('pages.pelamar.pelamar', compact('table', 'data_pelamar', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = "Tambah Lamaran";
        $data_job = DB::table("pekerjaan")->pluck("posisi","id_Pekerjaan");
        return view("pages.pelamar.v_add_pelamar", compact('table','data_job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post = new \App\PelamarModel;

       $id = $request->id_Pekerjaan;
       $query = DB::select('select * from pekerjaan where id_Pekerjaan =?', [$id]);
       
        foreach($query as $qry){
            $isi = $qry->id_BadanUsaha;
        }

        $post->id_Pekerjaan = $id;
        $post->id_BadanUsaha = $isi;
        $post->nama = $request->nama;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->alamat = $request->alamat; 

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
        return redirect('pelamar');

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
        $table = "Edit Pelamar";
        return view('pages.pelamar.v_data_pelamar', compact('table', 'data_pelamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_Lamaran)
    {
        $data_pelamar = PelamarModel::find($id_Lamaran);
        $data_job = DB::table("pekerjaan")->pluck("posisi","id_Pekerjaan");
        $post = PekerjaanModel::get(); 
        $table = "Edit Pekerjaan";
        return view('pages.pelamar.v_edit_pelamar', compact('post', 'table', 'data_pelamar','data_job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_Lamaran)
    {
            $post = PelamarModel::find($id_Lamaran);

            $input = $request->all();

            if($request->hasFile('foto') || $request->hasFile('ktp') || $request->hasFile('skck') || $request->hasFile('ktm') || $request->hasFile('sks')){
                $foto = $request->file('foto');
                $ktp = $request->file('ktp');
                $skck = $request->file('skck');
                $ktm = $request->file('ktm');
                $sks = $request->file('sks');
                    
                if(isset($post->foto) && file_exists('images/'.$post->foto) || isset($post->ktp) && file_exists('images/'.$post->ktp) || isset($post->skck) && file_exists('images/'.$post->skck) || isset($post->ktm) && file_exists('images/'.$post->ktm) || isset($post->sks) && file_exists('images/'.$post->sks)){
                        unlink('images/'.$post->foto);
                        unlink('images/'.$post->ktp);
                        unlink('images/'.$post->skck);
                        unlink('images/'.$post->ktm);
                        unlink('images/'.$post->sks);
                    }
                
                if($foto->isValid() || $ktp->isValid() || $skck->isValid() || $ktm->isValid() || $sks->isValid()){

                    $img_foto = rand() . '.' . $foto->
                        getClientOriginalExtension();
                    $img_ktp = rand() . '.' . $ktp->
                        getClientOriginalExtension();
                    $img_skck = rand() . '.' . $skck->
                        getClientOriginalExtension();
                    $img_ktm = rand() . '.' . $ktm->
                        getClientOriginalExtension();
                    $img_sks = rand() . '.' . $sks->
                        getClientOriginalExtension();

                    $upload_path = 'images';

                    $foto->move($upload_path, $img_foto);
                    $ktp->move($upload_path, $img_ktp);
                    $skck->move($upload_path, $img_skck);
                    $ktm->move($upload_path, $img_ktm);
                    $sks->move($upload_path, $img_sks);

                    $input['foto'] = $img_foto;
                    $input['ktp'] = $img_ktp;
                    $input['skck'] = $img_skck;
                    $input['ktm'] = $img_ktm;
                    $input['sks'] = $img_sks;
                }

            }

            $post->update($input);
            return redirect('pelamar')->with('success', 'Kategori film telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_Lamaran)
    {
        $post = PelamarModel::find($id_Lamaran);

        if(isset($post->foto) && file_exists('images/'.$post->foto) && isset($post->ktp) && file_exists('images/'.$post->ktp) && isset($post->skck) && file_exists('images/'.$post->skck) && isset($post->ktm) && file_exists('images/'.$post->ktm) && isset($post->sks) && file_exists('images/'.$post->sks)){
            unlink('images/'.$post->foto);
            unlink('images/'.$post->ktp);
            unlink('images/'.$post->skck);
            unlink('images/'.$post->ktm);
            unlink('images/'.$post->sks);
        }else{
            echo"sasasasas";
        }

        $post->delete();
        return redirect('pelamar')->with('success', 'Stock has been deleted Successfully');
    }


    /**
     * under this comment is for user only
     * FOR User Only || FOR User Only || FOR User Only
     * FOR User Only || FOR User Only || FOR User Only
     * 
     */


}
