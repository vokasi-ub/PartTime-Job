@extends('pages.dashboard-user')
@section('konten')

              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Users</h6>
                  </div>

                  <div class="btn-group">
                      <a class="ml-3 mb-2 mt-2 btn btn-success btn-sm" href="{{ route('jobHole.create') }}">Tambah</a>
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
                              <a class="btn btn-warning btn-sm" href="{{ route('jobHole.edit', $job->id_Pekerjaan) }}">Edit</a>

                              <form action="{{ route('jobHole.destroy', $job->id_Pekerjaan) }}" method="post">
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
              </div>
@endsection              
