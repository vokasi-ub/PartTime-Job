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

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">

      <div class="container mt-5">
      @if(session()->get('success'))
          <div class="alert alert-success w-100 h-50">
            {{ session()->get('success') }}
          </div>
        @endif
        <div class="row">
        <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Share With Love</h6>
                  </div>
                  <div class="btn-group">
                      <a class="ml-3 mb-2 mt-2 mr-3 btn btn-success btn-sm text-white" disabled>Daftar Lowongan Kerja</a>
                      </div>
                  <div class="card-body p-0 pb-3 text-center">
                  <div class="table-responsive">
                    <table class="table mb-0">
                    <form action="{{ url()->current() }}" class="sidebar">
                      <div class="input-group w-25 float-right mr-3 mb-3">
                        <input type="text" name="keyword" class="form-control" placeholder="Search...">
                          <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                          </span>
                        </input>
                      </div>
                    </form>
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Perusahaan</th>
                          <th scope="col" class="border-0">Posisi Kerja</th>
                          <th scope="col" class="border-0">Waktu Kerja</th>
                          <th scope="col" class="border-0">Persyaratan</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $nomor = 0; ?>
                      @foreach($data as $key=>$job)
                      <?php $nomor++ ; ?>
                        <tr>
                          <td>{{ $nomor }}</td>
                          <td>{{ $job->badanUsaha->nama_BadanUsaha }}</td>
                          <td>{{ $job->posisi }}</td>
                          <td>{{ $job->jam_Kerja }}</td>
                          <td>{{ $job->persyaratan }}</td>
                          <td>
                          <a href="{{ route('lowongan.insert', $job->id_Pekerjaan) }}" class="btn btn-warning btn-sm text-dark float-left ml-3" >GassKeun!</a>                              
                          </td>
							      	  </tr>
                      @endforeach
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>



        </div>
      </div>

    </section><!-- #about -->

    </main>

    @include('layouts.footer-fronend')


  <!-- Modal Register User --><!-- Modal Register User --><!-- Modal Register User -->
  <!-- Modal Register User --><!-- Modal Register User --><!-- Modal Register User -->
  <!-- Modal Register User --><!-- Modal Register User --><!-- Modal Register User -->

  <!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Daftarkan Instansi Anda </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{ route('register') }}">
      <div class="modal-body">
      
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

      </div>
      </form>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


 <!-- Modal Register User --><!-- Modal Register User --><!-- Modal Register User -->


 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Isikan Data Valid gengs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" role="form" action="{{ action('FrontendController@createApply') }}" enctype="multipart/form-data">
      <div class="modal-body">                          
                          <div class="form-group">
                          <label for="exampleInputEmail1">Nama Pekerjaan</label>
                          <select id="job" class="form-control input-lg dynamic" data-dependent="id_Pekerjaan" name="id_Pekerjaan">
                            <option selected="selected" value=""> -- Pilih Pekerjaan -- </option>
                              <div class="form-group">

                              @foreach($data as $yek=>$key)                            
                            <option value="{{ $key->id_Pekerjaan }}">{{ $key->badanUsaha->nama_BadanUsaha }} || {{ $key->posisi }}</option>
                              @endforeach                                                          
                            </div>                                                                                                                       
                          <select>

                            {{ csrf_field() }}                                       

                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">Nama Pelamar</label>
                              <input type="text" class="form-control" name="nama" placeholder="Nama Pelamar.."> </div>

                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Eamil.."> </div>

                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">No. Telp</label>
                              <input type="number" class="form-control" name="phone" placeholder="No telp.."> </div>

                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tempat Tinggal</label>
                            <textarea class="form-control" name="alamat" rows="5"></textarea>
                          </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">Foto</label>
                              <input type="file" class="form-control" name="foto" placeholder="Nama Instansi.."> </div>
                             

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">KTP</label>
                              <input type="file" class="form-control" name="ktp" placeholder="Nama Instansi.."> </div>
                              

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">SKCK</label>
                              <input type="file" class="form-control" name="skck" placeholder="Nama Instansi.."> </div>
                              

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">KTM</label>
                              <input type="file" class="form-control" name="ktm" placeholder="Nama Instansi.."> </div>
                              

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">SK. Sehat</label>
                              <input type="file" class="form-control" name="sks" placeholder="Nama Instansi.."> </div>
                                                      

                            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                            
                                                    

      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection