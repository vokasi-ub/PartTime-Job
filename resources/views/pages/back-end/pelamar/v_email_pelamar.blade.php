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

                          <!-- Form Kirim Email -->
                          <form method="post" role="form" action="{{ route('lamaran.sendMail') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" value="{{ $data_pelamar->email }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" value="{{ $data_pelamar->nama }}">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="email_body" placeholder="Enter your message here..."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                    <!-- End Form Kirim Email -->
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
@endsection