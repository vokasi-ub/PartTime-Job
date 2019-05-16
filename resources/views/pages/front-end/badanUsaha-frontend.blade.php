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
          <li><a href="#about">Instansi</a></li>
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
        <div class="row">

          

        <div class="col">
                <div class="card card-small mb-10">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Badan Usahanya</h6>
                  </div>
                  <div class="btn-group">
                      <a class="ml-3 mb-2 mt-2 btn btn-success btn-sm text-white" disabled>Tambah</a>
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
                          <th scope="col" class="border-0">Nama Instansi</th>
                          <th scope="col" class="border-0">Alamat</th>
                          <th scope="col" class="border-0">No. Telp</th>
                          <th scope="col" class="border-0">Website</th>
                          <th scope="col" class="border-0">Tgl_Berdiri</th>
                          <th scope="col" class="border-0">Email</th>
                          <th scope="col" class="border-0">...</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $nomor = 0; ?>
        				    	@foreach($data_post as $instansi)
							        <?php $nomor++ ; ?>
                      <tr>
                        <td>{{$nomor}}</td>
                        <td>{{$instansi->nama_BadanUsaha}}</td>
                        <td>{{$instansi->alamat}}</td>
                        <td>{{$instansi->nomor_telp}}</td>
                        <td>
                          <a href="{{$instansi->website}}">
                            Visit Our Web
                          </a>
                        </td>
                        <td>{{$instansi->tgl_Berdiri}}</td>
                        <td>{{$instansi->email}}</td>
                        <td>
                              <a class="btn btn-warning btn-sm" href="{{ $instansi->social_Media }}">Sosmednya</a>
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

  <!--==========================
    Footer
  ============================-->
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

@endsection