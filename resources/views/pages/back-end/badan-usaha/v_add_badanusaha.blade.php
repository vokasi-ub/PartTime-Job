@extends('pages.dashboard-user')

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

                          <form method="post" role="form" action="{{ route('instansi.store') }}">                           
                            
                            <div class="form-group">
                            @csrf                            
                            <label class="col-sm-12 col-form-label row">Nama Instansi</label>                               
                              <input type="text" class="form-control" name="nama_BadanUsaha" placeholder="Nama Instansi.."> </div>                                                       

                            <div class="form-group">
                            <label class="col-sm-12 col-form-label row">Alamat Instansi</label>
                              <input type="text" class="form-control" name="alamat" placeholder="Alamat Instansi.."> </div>

                            <div class="form-group">
                            <label class="col-sm-12 col-form-label row">No. Telp Instansi</label>
                              <input type="text" class="form-control" name="nomor_Telp" placeholder="Nomer Telepon Instansi.."> </div>

                            <div class="form-group">
                            <label class="col-sm-12 col-form-label row">Website Instansi</label>
                              <input type="text" class="form-control" name="website" placeholder="Website Instansi.."> </div>
                            
                            <div class="form-group">
                            <label class="col-sm-12 col-form-label row">Tanggal Berdiri Instansi</label>
                              <input type="text" class="date form-control" name="tgl_Berdiri" data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="Tanggal Berdiri Instansi.." data-mask> </div>

                            <div class="form-group">
                            <label class="col-sm-12 col-form-label row">Email Instansi</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Email Instansi.."> </div>

                            <div class="form-group">
                            <label class="col-sm-12 col-form-label row">Social Media Instansi</label>
                              <input type="text" class="form-control" name="social_Media" placeholder="Social Media Instansi.."> </div>

                            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                            
                          </form>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

<script type="text/javascript">
$('.date').datepicker({  

   format: 'yyyy-mm-dd'
 });  
</script>
@endsection
