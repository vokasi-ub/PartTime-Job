@extends('pages.dashboard-user')
@section('konten')

              <div class="col">
                <div class="card card-small mb-10">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Users</h6>
                  </div>

                  <div class="card-body p-0 pb-3 text-center">
                  <div class="table-responsive">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nama Instansi</th>
                          <th scope="col" class="border-0">Alamat</th>
                          <th scope="col" class="border-0">No. Telp</th>
                          <th scope="col" class="border-0">Website</th>
                          <th scope="col" class="border-0">Tgl_Berdiri</th>
                          <th scope="col" class="border-0">Email</th>
                          <th scope="col" class="border-0">Sosmed</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $nomor = 0; ?>
        				    	@foreach($data as $instansi)
							        <?php $nomor++ ; ?>
                      <tr>
                        <td>{{$nomor}}</td>
                        <td>{{$instansi->nama_BadanUsaha}}</td>
                        <td>{{$instansi->alamat}}</td>
                        <td>{{$instansi->nomor_telp}}</td>
                        <td>{{$instansi->website}}</td>
                        <td>{{$instansi->tgl_Berdiri}}</td>
                        <td>{{$instansi->email}}</td>
                        <td>{{$instansi->social_Media}}</td>
                        <td>
                              <a class="btn btn-warning btn-sm" href="{{ route('instansi.edit', $instansi->id_BadanUsaha) }}">Edit</a>
                        </td>
							      	</tr>
        					     @endforeach                      
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection              
