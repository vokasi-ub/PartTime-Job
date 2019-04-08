@extends('pages.dashboard-user')
@section('konten')

  <div class="card col-md-10 ml-5 mb-5" style="width: 18rem;">
  <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
  <div class="card-body bg-info">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <div class="btn-group">
        <a class="ml-3 mb-2 mt-2 btn btn-secondary btn-sm" href="{{ route('bio.create') }}">Tambah</a>
    </div>
  </div>
  @foreach($data as $instansi)
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$instansi->nama_BadanUsaha}}</li>
    <li class="list-group-item">{{$instansi->alamat}}</li>
    <li class="list-group-item">{{$instansi->nomor_telp}}</li>
    <li class="list-group-item"><a href="{{$instansi->website}}">{{$instansi->website}}</a></li>
    <li class="list-group-item">{{$instansi->tgl_Berdiri}}</li>
    <li class="list-group-item">{{$instansi->email}}</li>
  </ul>
  <div class="card-body">
    <a class="btn btn-warning btn-sm w-50" href="{{ route('instansi.edit', $instansi->id_BadanUsaha) }}">Edit</a>
    <a class="btn btn-primary btn-sm w-25 float-right" href="https://www.instagram.com/mysupersoccer/">Contact</a>
  </div>
  @endforeach 
</div>
@endsection              
