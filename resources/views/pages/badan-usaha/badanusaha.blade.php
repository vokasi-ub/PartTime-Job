@extends('pages.dashboard')
@section('konten')

              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Users</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
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
        				    	@foreach($data_post as $instansi)
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
                              <a class="btn btn-warning btn-sm" href="{{ route('badan-usaha.edit', $instansi->id_BadanUsaha) }}">Edit</a>

                              <form action="{{ route('badan-usaha.destroy', $instansi->id_BadanUsaha) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                              </form>
                        </td>
							      	</tr>
        					     @endforeach                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection              
