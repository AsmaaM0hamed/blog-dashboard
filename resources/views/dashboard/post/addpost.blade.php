@extends('dashboard.layout.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>add posts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">add posts</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@if (session('add'))
<div class="alert alert-success" role="alert">
{{ session('add') }}
</div>
@endif


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">add posts</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">description</label>
                        <textarea class="form-control" name="desc" rows="3" placeholder="Enter ..." ></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>category</label>
                            <select class="form-control" name="cat_id">
                                @foreach ($cats as $cat)
                                <option value="{{ $cat['id'] }}" >{{ $cat['title'] }}</option>
                                @endforeach

                            </select>
                    </div>
                    <div class="form-group">
                            <label>writer</label>
                            <select class="form-control" name="user_id">
                                @foreach ($users as $user )
                                <option value="{{ $user['id'] }}" >{{$user['name']}}</option>
                                @endforeach


                            </select>
                    </div>

                  <label for="exampleInputPassword1">image</label>
                  <input type="file" class="form-control" name="img">
                </div>




              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
          <!-- /.card -->
@endsection
