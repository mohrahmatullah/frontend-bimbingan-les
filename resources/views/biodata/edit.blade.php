@extends('includes.default')
@section('title', 'LES | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Edit Biodata</h1>
      </div>
            
      <div class="row">
          @if($alert_toast = Session::get('alert_toast'))
              <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                  <div class="hero-inner">
                    <h2>{{$alert_toast['title']}}</h2>
                    <p class="lead">{{$alert_toast['text']}}</p>
                  </div>
                </div>
              </div>
          @endif
          
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                  <div class="mb-3">
                    <label class="mb-3">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $table['nama'] }}" required="">
                  </div>
                  <div class="mb-3">
                    <label class="mb-3">Gender</label>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk" id="gender1" value="pria" {{ $table['jk'] == 'pria' ? 'checked':'' }} >
                      <label class="form-check-label" for="gender1">
                        Pria
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk" id="gender2" value="wanita" {{ $table['jk'] == 'wanita' ? 'checked':'' }}>
                      <label class="form-check-label" for="gender2">
                        Wanita
                      </label>
                    </div>

                  </div>
                  <div class="mb-3">
                    <label class="mb-3">Agama</label>
                    <input type="text" class="form-control" name="agama" value="{{ $table['agama'] }}" required="">
                  </div>
                  <div class="mb-3">
                    <label class="mb-3">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{ $table['alamat'] }}" required="">
                  </div>
                </div>

                <div class="card-footer text-right">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>

      </div>

    </div><!-- End Container-->
  </div><!-- End Content-->
@endsection
