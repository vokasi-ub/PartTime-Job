<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
    public function index(Request $request)
    {
        $id = \Auth::user()->id;
        $data = PelamarModel::with(['badanUsaha','pekerjaan'])->when($request->keyword, function ($query) use ($request) {
            $query->where('nama', 'like', "%{$request->keyword}%");
        })->get()->where('badanUsaha.id',$id);

        $table = "Tabel Pelamar [INSTANSI]";

        return view('pages.back-end.pelamar.pelamar', compact('table', 'data'));
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
    public function edit($id_Lamaran)
    {
        $table = "Kirim Email Pelamar [INSTANSI]";
        $data_pelamar = PelamarModel::find($id_Lamaran);

        return view('pages.back-end.pelamar.v_email_pelamar', compact('table','data_pelamar'));
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
        //

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
        return redirect('lamaran')->with('success', 'Stock has been deleted Successfully');
    }

    public function emailHim(Request $request){
        $email = $request->email;
        $data = array(
            'nama' => $request->nama,
            'email_body' => $request->email_body
        );

        Mail::send('email_template',$data, function($mail) use($email) {
            $mail->to($email, 'no-reply')
                    ->subject("[ WAWANCARA - PartTime-Job ]");
            $mail->from('2kusumaa@gmail.com', 'PartTime-Job');
        });

        if(Mail::failures()){
            return "Gagal Mengirim Email";
        }

        return redirect('lamaran');
    }
        
}
