@extends('pages.dashboard-user')
@section('konten')

<div class="jumbotron text-center">
    <div align="right">
        <a href="{{ route('lamaran.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <br>
    <p>Foto :</p>
    <img src="{{ URL::to('/') }}/images/{{ $data_pelamar->foto }}" class="img-fluid img-thumbnail" />
    <br>
    <p>KTP :</p>
    <img src="{{ URL::to('/') }}/images/{{ $data_pelamar->ktp }}" class="img-fluid img-thumbnail" />
    <br>
    <p>SKCK :</p>
    <img src="{{ URL::to('/') }}/images/{{ $data_pelamar->skck }}" class="img-fluid img-thumbnail" />
    <br>
    <p>KTM :</p>
    <img src="{{ URL::to('/') }}/images/{{ $data_pelamar->ktm }}" class="img-fluid img-thumbnail" />
    <br>
    <p>Surat Keterangan Sehat :</p>
    <img src="{{ URL::to('/') }}/images/{{ $data_pelamar->sks }}" class="img-fluid img-thumbnail" />
    
    <h3>Nama Pelamar - {{ $data_pelamar->nama }}</h3>
    <h3>Email - {{ $data_pelamar->email }}</h3>
    <h3>No. Telp - {{ $data_pelamar->phone }}</h3>
    <h3>Alamat - {{ $data_pelamar->alamat }}</h3>
</div>

@endsection