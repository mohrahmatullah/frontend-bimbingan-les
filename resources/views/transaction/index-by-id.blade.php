@extends('includes.default')
@section('title', 'LES | Dashboard')
@section('content')
<div class="content-start transition">
  <div class="container-fluid dashboard">
    <div class="content-header">
      <h1>Transaction</h1>
      <p></p>
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
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($table as $row)
              <tr>
                <th scope="row">{{ $table->firstItem() + $loop->index }}</th>
                <td>{{ $row['biodata']['nama'] }}</td>
                <td>{{ $row['kelas']['nama'] }}</td>
                <td>{{ $row['jurusan']['nama_jurusan'] }}</td>
                <td>{{ $row['jadwal_belajar']['waktu'] }}</td>
                <td>{{ $row['les'] }}</td>
                <td>{{ $row['status'] }}</td>
                <td>{{ date('d M Y', strtotime($row['created_at'])) }}</td>
                <td>
                  <a href="{{route('approve-transactions', $row['id'])}}" class="btn btn-primary btn-sm">Approve</button>
                  <a href="{{route('cancel-transactions', $row['id'])}}" class="btn btn-warning btn-sm">Cancel</button>
                </td>
              </tr>
              @endforeach
            </tbody>
            </table>
            {!! $table->appends(Request::capture()->except('page'))->render('layouts.paginate') !!}
            </div>
          </div>
        </div>
      </div>

     </div>
  </div>
</div>
@endsection
