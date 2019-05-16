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
        $data_pelamar = PelamarModel::with(['badanUsaha','pekerjaan'])->when($request->keyword, function ($query) use ($request) {
            $query->where('nama', 'like', "%{$request->keyword}%");
        })->get();
        $table = "Tabel Pelamar";

        return view('pages.pelamar.pelamar', compact('table', 'data_pelamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = "Tambah Lamaran";
        $data_job = PekerjaanModel::pluck("posisi","id_Pekerjaan");
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
        

        $images = ['foto', 'ktp', 'skck', 'ktm', 'sks'];


            foreach ($images as $value) {
            
                if( ! empty($request->file($value)) ){
                    $post[$value] = $this->storeImage($request, $value, $post);
                }
            }

        $post->save();
        return redirect('pelamar');

    }

    public function storeImage($request, $value, $post)
    {
        $file = $request->file($value);
        $nama_img = rand() . '.' . $file->getClientOriginalExtension();       
        $file->move(public_path('images'), $nama_img);
        $post->{$value} = $nama_img;

        return $nama_img;
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

    public function isValid2($request)
    {
        $rules = [];

            if ($request->has('foto')) {

                $request->validate([
                    'foto' => 'required|image|max:2048',
                ]);
            }

            if ($request->has('ktp')) {
                
                $request->validate([
                    'ktp' => 'required|image|max:2048',
                ]);
            }

            if ($request->has('skck')) {
                
                $request->validate([
                    'skck' => 'required|image|max:2048',
                ]);
            }

            if ($request->has('ktm')) {
                
                $request->validate([
                    'ktm' => 'required|image|max:2048',
                ]);
            }

            if ($request->has('sks')) {
                
                $request->validate([
                    'sks' => 'required|image|max:2048',
                ]);
            }

             return $rules;
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
        $data_job = PekerjaanModel::all();
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

            $images = ['foto', 'ktp', 'skck', 'ktm', 'sks'];


            foreach ($images as $value) {
            
                if( ! empty($request->file($value)) ){
                    $input[$value] = $this->uploadImage($request, $value, $post);
                }
            }

            $post->update($input);
            return redirect('pelamar')->with('success', 'Kategori film telah diubah');
    }


    public function uploadImage($request, $field, $post)
    {

        $this->isValid2($request);
             
        $file = $request->file($field); // == $ktp = $request->file('ktp');
        unlink('images/'.$post->{$field}); //== unlink('images/'.$post->ktp);
        $name = rand() . '.' . $file->getClientOriginalExtension(); // == $img_ktp = rand() . '.' . $ktp->getClientOriginalExtension();
        $upload_path = 'images';
        $file->move($upload_path, $name);

        return $name;
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
