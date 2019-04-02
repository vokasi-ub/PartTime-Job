@extends('pages.dashboard')

@section('konten')

<div class="col-lg-12 mb-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Form Inputs</h6>
                  </div>

                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col-sm-12 col-md-6">
                          <strong class="text-muted d-block mb-2">Forms</strong>

                          <form method="post" role="form" action="{{ route('pelamar.update', $data_pelamar->id_Lamaran) }}" enctype="multipart/form-data">
                          @method('PATCH')
                          @csrf

                          <div class="form-group">
                          <label for="exampleInputEmail1">Nama Pekerjaan</label>
                          <select id="job" class="form-control input-lg dynamic" data-dependent="id_Pekerjaan" name="id_Pekerjaan">
                            <option selected="selected" value=""> -- Pilih Pekerjaan -- </option>
                              <div class="form-group">  
                              @foreach($data_job as $key => $job )                            
                            <option value="{{ $key }}">{{ $job }}</option>
                              @endforeach                                                          
                            </div>                                                                                                                       
                          <select>


                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">Nama Pelamar</label>
                              <input type="text" class="form-control" name="nama" value="{{ $data_pelamar->nama }}" placeholder="Nama Instansi.."> </div>

                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">Email</label>
                              <input type="text" class="form-control" name="email" value="{{ $data_pelamar->email }}" placeholder="Nama Instansi.."> </div>

                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">No. Telp</label>
                              <input type="text" class="form-control" name="phone" value="{{ $data_pelamar->phone }}" placeholder="Nama Instansi.."> </div>

                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tempat Tinggal</label>
                            <textarea class="form-control" name="alamat" rows="5">{{ $data_pelamar->alamat }}</textarea>
                          </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">Foto</label>
                              <input type="file" class="form-control" name="foto" placeholder="Nama Instansi.."> 
                              <img src="{{ URL::to('/')}}/images/{{ $data_pelamar->foto }}" class="img-tumbnail" width="100" />
                              <input type="hidden" name="hidden_foto" value="{{ $data_pelamar->foto }}" />
                              </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">KTP</label>
                              <input type="file" class="form-control" name="ktp" placeholder="Nama Instansi.."> 
                              <img src="{{ URL::to('/')}}/images/{{ $data_pelamar->ktp }}" class="img-tumbnail" width="100" />
                              <input type="hidden" name="hidden_ktp" value="{{ $data_pelamar->ktp }}" />
                              </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">SKCK</label>
                              <input type="file" class="form-control" name="skck" placeholder="Nama Instansi.."> 
                              <img src="{{ URL::to('/')}}/images/{{ $data_pelamar->skck }}" class="img-tumbnail" width="100" />
                              <input type="hidden" name="hidden_skck" value="{{ $data_pelamar->skck }}" />
                              </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">KTM</label>
                              <input type="file" class="form-control" name="ktm" placeholder="Nama Instansi.."> 
                              <img src="{{ URL::to('/')}}/images/{{ $data_pelamar->ktm }}" class="img-tumbnail" width="100" />
                              <input type="hidden" name="hidden_ktm" value="{{ $data_pelamar->ktm }}" />
                              </div>

                          <div class="form-group">            
                            <label class="col-sm-8 col-form-label row">SK. Sehat</label>
                              <input type="file" class="form-control" name="sks" placeholder="Nama Instansi.."> 
                              <img src="{{ URL::to('/')}}/images/{{ $data_pelamar->sks }}" class="img-tumbnail" width="100" />
                              <input type="hidden" name="hidden_sks" value="{{ $data_pelamar->sks }}" />
                              </div>                          

                            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                            
                          </form>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
@endsection