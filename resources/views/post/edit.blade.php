@extends('includes.default')
@section('title', 'Blog | Dashboard')
@section('content')
<!--Content Start-->
  <div class="content-start transition  "> 
    <div class="container-fluid dashboard">
      <div class="content-header">
        <h1>Edit Post</h1>
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
                      <option value="{{$row['id']}}" {{ $table['category_id'] == $row['id'] ? 'selected' : ''}}>{{$row['title']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Tag</label>
                    <select class="form-control form-control-sm multiple" name="tag_id[]" multiple="multiple" required="">
                      @foreach($tag as $row)
                      <option value="{{$row['id']}}" {{ in_array($row['id'], json_decode($table['tag_id']) ) ? 'selected':'' }}>{{$row['title']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $table['title'] }}" required="">
                  </div>
                  <div class="mb-3">
                    <label>Body</label>
                    <textarea id="body" class="form-control" name="body" required="" rows="4" cols="50">{{ $table['body'] }}</textarea>
                  </div>
                  <div class="mb-3">
                    <label>Status</label>
                    <select class="form-control form-control-sm" name="status">
                      <option value="publish" {{ $table['status'] == 'publish' ? 'selected' : ''}}>Publish</option>
                      <option value="draft" {{ $table['status'] == 'draft' ? 'selected' : ''}}>Draft</option>
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
