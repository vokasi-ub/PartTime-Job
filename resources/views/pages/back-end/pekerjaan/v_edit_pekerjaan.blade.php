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

                          <form method="post" role="form" action="{{ route('jobHole.update', $data_job->id_Pekerjaan) }}">
                          @method('PATCH')
                          @csrf
                          <div class="form-group">
                          <label for="exampleInputEmail1">Nama Badan Usaha</label>
                          <select id="id_BadanUsaha" class="form-control" name="id_BadanUsaha">
                        @foreach($post as $id)
                            <?php if($id->id_BadanUsaha == $data_job->id_BadanUsaha) { ?>
                            <option selected="selected" value="{{ $id->id_BadanUsaha }}">{{ $id->nama_BadanUsaha }}</option>
                            <?php } else { ?>
                            <option value="{{ $id->id_BadanUsaha }}">{{ $id->nama_BadanUsaha }}</option>
                            <?php } ?>
                        @endforeach
                            </div>
                          <select>

                          <div class="form-group">            
                            <label class="col-sm-12 col-form-label row">Posisi Kerja</label>
                              <input type="text" class="form-control" name="posisi" value="{{ $data_job->posisi }}"> </div>                          

                          <div class="form-group">
                          <label for="exampleInputEmail1">Waktu Kerja</label>
                          <select id="jam_Kerja" class="form-control" name="jam_Kerja">
                            <option value=""> -- Pilih Shift Kerja -- </option>
                            <option value="Pagi"<?=$data_job['jam_Kerja'] == 'Pagi' ? ' selected="selected"' : '';?>>Shift Pagi (08.00 WIB)</option>                            
                            <option value="Siang"<?=$data_job['jam_Kerja'] == 'Siang' ? ' selected="selected"' : '';?>>Shift Siang (13.00 WIB)</option>
                            <option value="Malam"<?=$data_job['jam_Kerja'] == 'Malam' ? ' selected="selected"' : '';?>>Shift Malam (18.00 WIB)</option>                            
                          <select>

                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Persyaratan</label>
                            <textarea class="form-control" name="persyaratan" value="" rows="5">{{ $data_job->persyaratan }}</textarea>
                          </div>

                            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                            
                          </form>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
@endsection