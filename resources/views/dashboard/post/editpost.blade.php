@extends('dashboard.layout.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>edit posts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">edit posts</li>
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
              <h3 class="card-title">edit posts</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('post.update',$post['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
              <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" value="{{ $post['title'] }}" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">description</label>
                        <textarea class="form-control" name="desc" rows="3" placeholder="Enter ..." >{{ $post['desc'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>category</label>
                            <select class="form-control" name="cat_id">
                                <option value="{{ $post['categories_id'] }}" >{{ $post->cat->title }}</option>
                                @foreach ($cats as $cat)
                                <option value="{{ $cat['id'] }}" >{{ $cat['title'] }}</option>
                                @endforeach

                            </select>
                    </div>
                    <div class="form-group">
                            <label>writer</label>
                            <select class="form-control" name="user_id">
                                <option value="{{ $post['user_id'] }}" >{{ $post->user->name }}</option>
                                @foreach ($users as $user )
                                <option value="{{ $user['id'] }}" >{{$user['name']}}</option>
                                @endforeach
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
                    <img style="width: 150px; height:150px ;" src="{{ URL::asset('postimg').'/'.$post['img'] }}" alt="">
<br>
                  <label for="exampleInputPassword1">image</label>
                  <input type="file" required class="form-control" name="img">
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
