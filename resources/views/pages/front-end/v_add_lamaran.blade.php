@extends('pages.dashboard-frontend')
@section('konten')

<!--==========================
  Header
  ============================-->
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>PARTO</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">Lowongan</a></li>
          <li class="drop-down"><a href="#">Menu</a>
            <ul>
              <li><a href="" data-toggle="modal" data-target="#exampleModalScrollable">Registrasi Badan Usaha</a></li>
              <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
              <li><a href="{{ url('/lowongan') }}">Daftar Pekerjaan</a></li>
              <li><a href="{{ url('/badanUsaha') }}">Daftar Badan Usaha</a></li>
            </ul>
          </li>
          <li><a href="#footer">Contact Us</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="introo" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
        </div>        
      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

  <section id="about">

      <div class="container mt-5">
        <div class="row" align="center">

<div class="col-12 mb-5 mt-5">
                <div class="card card-small mb-4" style="background-color:#1c1b1b;">
                  <div class="card-header border-bottom">
                    <h6 class="m-0" style="color:#fff9f9">Form Inputs</h6>
                  </div>

                  <ul class="list-group list-group-flush" style="background-color:#1c1b1b">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col-sm-12 col-md-6">
                          <strong class="text-muted d-block mb-2">Forms</strong>

                          <form method="post" role="form" action="{{ action('FrontendController@createApply') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}

                          <div class="form-group" align="center">
                          <label for="exampleInputEmail1">Nama Pekerjaan</label>
                          <select id="job" disabled class="form-control input-lg dynamic" data-dependent="id_Pekerjaan" name="">
                              <div class="form-group">  
                              @foreach($data_usaha as $job ) 
                              @if ($job->id_Pekerjaan == $post->id_Pekerjaan)                           
                            <option selected="selected" value="{{ $job->id_Pekerjaan }}">{{ $job->posisi }}</option>
                              @else
                            <option value="{{ $job->id_Pekerjaan }}">{{ $job->posisi }}</option>
                              @endif
                              @endforeach                                                          
                            </div>                                                                                                                       
                          <select>
                                         
                              <input type="hidden" required class="form-control" name="id_Pekerjaan" value="{{$post->id_Pekerjaan}}">
                        
                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">Nama Pelamar</label>
                              <input type="text" required class="form-control" name="nama" placeholder="Nama Instansi.."> </div>

                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">Email</label>
                              <input type="text" required class="form-control" name="email" placeholder="Nama Instansi.."> </div>

                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">No. Telp</label>
                              <input type="text" required class="form-control" name="phone" placeholder="Nama Instansi.."> </div>

                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tempat Tinggal</label>
                            <textarea required class="form-control" name="alamat" rows="5"></textarea>
                          </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">Foto</label>
                              <input type="file" required class="form-control" name="foto" placeholder="Nama Instansi.."> 
                              </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">KTP</label>
                              <input type="file" required class="form-control" name="ktp" placeholder="Nama Instansi..">                         
                              </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">SKCK</label>
                              <input type="file" required class="form-control" name="skck" placeholder="Nama Instansi..">                              
                              </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">KTM</label>
                              <input type="file" required class="form-control" name="ktm" placeholder="Nama Instansi..">                               
                              </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">SK. Sehat</label>
                              <input type="file" required class="form-control" name="sks" placeholder="Nama Instansi..">                              
                              </div>                          

                            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                            
                          </form>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
@endsection