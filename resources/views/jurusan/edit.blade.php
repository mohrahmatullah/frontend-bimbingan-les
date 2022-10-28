@extends('includes.default')
@section('title', 'LES | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Edit Jurusan</h1>
      </div>
            
      <div class="row">

          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                  <div class="mb-3">
                    <label>Kode Jurusan</label>
                    <input type="text" class="form-control" name="kode_jurusan" value="{{ $table['kode_jurusan'] }}" required="">
                  </div><div class="mb-3">
                    <label>Nama Jurusan</label>
                    <input type="text" class="form-control" name="nama_jurusan" value="{{ $table['nama_jurusan'] }}" required="">
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
