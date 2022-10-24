@extends('dashboard.layout.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>add writers</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">add writers</li>
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
              <h3 class="card-title">add writers</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('users.store') }}" method="post" >
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">name</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="email" name="email" class="form-control" name="title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="password" name="pass" class="form-control" name="title">
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
