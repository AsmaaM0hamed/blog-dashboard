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
            <form action="{{ route('add_tags') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">


                    <div class="form-group">
                        <label>post </label>
                        <select class="form-control" name="post_id" >

                            <option value="{{ $post['id'] }}" >{{ $post['title'] }}</option>


                        </select>
                    </div>

                    <div class="form-group">
                        <label>tags (يمكن اضافة اكثر من تاج)</label>
                        <select class="form-control" name="tags[]" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag['id'] }}" >{{ $tag['title'] }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
          <!-- /.card -->
@endsection
