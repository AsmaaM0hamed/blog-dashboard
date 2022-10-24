@extends('dashboard.layout.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>edit categories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">edit categories</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">edit categories</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('categories.update',$cat['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">title</label>
                  <input type="text" value="{{ $cat['title'] }}" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <img style="width: 150px; height:150px ;" src="{{ URL::asset('categors').'/'.$cat['img'] }}" alt="">
                <hr>
                  <label for="exampleInputPassword1">image</label>
                  <input type="file" class="form-control" name="img">
                </div>


              </div>
              <!-- /.card-body -->

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
