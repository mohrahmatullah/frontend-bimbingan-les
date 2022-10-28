@extends('includes.default')
@section('title', 'LES | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Registrasi Bimbingan Belajar</h1>
      </div>
            
      <div class="row mt-5">

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
                    <input type="hidden" class="form-control" name="id_biodata" value="{{ $biodata['id'] }}">
                    <input type="text" class="form-control" name="nama" value="{{ $biodata['nama'] }}" readonly>
                  </div>
                  <div class="mb-3">
                    <label class="mb-3">Kelas</label>                    
                    <select class="form-control form-control-sm" name="id_kelas">
                      @foreach($kelas as $row)
                      <option value="{{ $row['id'] }}">{{ $row['nama'] }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="mb-3">Jurusan</label>                    
                    <select class="form-control form-control-sm" name="id_jurusan">
                      @foreach($jurusan as $row)
                      <option value="{{ $row['id'] }}">{{ $row['nama_jurusan'] }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="mb-3">Jadwal Belajar</label>                    
                    <select class="form-control form-control-sm" name="id_jadwal">
                      @foreach($jadwal_belajar as $row)
                      <option value="{{ $row['id'] }}">{{ $row['waktu'] }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="mb-3">Les</label>                   
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="les" id="les1" value="online" checked>
                      <label class="form-check-label" for="les1">
                        Online
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="les" id="les2" value="offline">
                      <label class="form-check-label" for="les2">
                        Offline
                      </label>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
          @if(count($transaction) > 0)
          <div class="col-md-12">
            <div class="card">
              <div class="card-body"> 
              <div class="table-responsive"> 
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Les</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transaction as $row)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row['biodata']['nama'] }}</td>
                    <td>{{ $row['kelas']['nama'] }}</td>
                    <td>{{ $row['jurusan']['nama_jurusan'] }}</td>
                    <td>{{ $row['jadwal_belajar']['waktu'] }}</td>
                    <td>{{ $row['les'] }}</td>
                    <td>{{ $row['status'] }}</td>
                    <td>{{ date('d M Y', strtotime($row['created_at'])) }}</td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
          @endif

      </div>

    </div><!-- End Container-->
  </div><!-- End Content-->
@endsection
