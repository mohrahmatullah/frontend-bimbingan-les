@extends('includes.default')
@section('title', 'Blog | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
      <div class="container-fluid dashboard">
        <div class="content-header">
          <h1>Profile</h1>
        </div>
        
        <div class="row match-height">
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-primary">
                      {{$profile['name']}}
                    </li>
                    <li class="list-group-item list-group-item-primary">
                      {{$profile['email']}}
                    </li>
                    <li class="list-group-item list-group-item-primary">
                      {{ date('d M Y', strtotime($profile['created_at'])) }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div> 
               
      </div><!-- End Container-->
  </div><!-- End Content-->

@endsection
