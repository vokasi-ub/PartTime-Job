@extends('pages.dashboard')
@section('konten')

              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Users</h6>
                  </div>

                  <div class="btn-group">
                      <a class="ml-3 mb-2 mt-2 btn btn-success btn-sm" href="{{ route('pelamar.create') }}">Tambah</a>
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
                          <th scope="col" class="border-0">Pekerjaan</th>
                          <th scope="col" class="border-0">Badan Usaha</th>
                          <th scope="col" class="border-0">Nama Pelamar</th>
                          <th scope="col" class="border-0">Email</th>
                          <th scope="col" class="border-0">No. Telp</th>
                          <th scope="col" class="border-0">Alamat</th>
                          <th scope="col" class="border-0">Foto</th>
                          <th scope="col" class="border-0">KTP</th>
                          <th scope="col" class="border-0">SKCK</th>
                          <th scope="col" class="border-0">KTM</th>
                          <th scope="col" class="border-0">SK. Sehat</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $nomor = 0; ?>
                      @foreach($data_pelamar as $lamar=>$key)
                      <?php $nomor++ ; ?>
                        <tr>
                          <td>{{ $nomor }}</td>
                          <td>{{ $key->pekerjaan->posisi }}</td>
                          <td>{{ $key->badanUsaha->nama_BadanUsaha }}</td>
                          <td>{{ $key->nama }}</td>
                          <td>{{ $key->email }}</td>
                          <td>{{ $key->phone }}</td>
                          <td>{{ $key->alamat }}</td>
                          <td><img src="{{ URL::to('/')}}/images/{{ $key->foto }}" class="img-tumbnail" width="75" /></td>
                          <td><img src="{{ URL::to('/')}}/images/{{ $key->ktp }}" class="img-tumbnail" width="75" /></td>
                          <td><img src="{{ URL::to('/')}}/images/{{ $key->skck }}" class="img-tumbnail" width="75" /></td>
                          <td><img src="{{ URL::to('/')}}/images/{{ $key->ktm }}" class="img-tumbnail" width="75" /></td>
                          <td><img src="{{ URL::to('/')}}/images/{{ $key->sks }}" class="img-tumbnail" width="75" /></td>
                          <td>
                              <a href="{{ route('pelamar.show', $key->id_Lamaran) }}" class="btn btn-primary">Show</a>
                              <a class="btn btn-warning btn-sm" href="{{ route('pelamar.edit', $key->id_Lamaran) }}">Edit</a>

                              <form action="{{ route('pelamar.destroy', $key->id_Lamaran) }}" method="post">
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
