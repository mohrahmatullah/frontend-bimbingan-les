@extends('includes.default')
@section('title', 'Blog | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Create Post</h1>
      </div>
            
      <div class="row">

          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                  <div class="mb-3">
                    <label>Category</label>
                    <select class="form-control form-control-sm" name="category_id">
                      @foreach($category as $row)
                      <option value="{{$row['id']}}">{{$row['title']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Tag</label>
                    <select class="form-control form-control-sm multiple" name="tag_id[]" multiple="multiple" required="">
                      @foreach($tag as $row)
                      <option value="{{$row['id']}}">{{$row['title']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" required="">
                  </div>
                  <div class="mb-3">
                    <label>Body</label>
                    <textarea id="body" class="form-control" name="body" required="" rows="50" cols="150"></textarea>
                  </div>
                  <div class="mb-3">
                    <label>Status</label>
                    <select class="form-control form-control-sm" name="status">
                      <option value="publish">Publish</option>
                      <option value="draft">Draft</option>
                    </select>
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
