@extends('dashboard.layout.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>all posts</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">all posts</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
        <a class="btn btn-success" style="width: 100%" href="{{ route("post.create") }}">add posts</a>
            </div>
            </div>
            </div>
        </section>
  </section>
  @if (session('delet'))
  <div class="alert alert-danger" role="alert">
  {{ session('delet') }}
  </div>

  @endif


  @if (session('edit'))
  <div class="alert alert-warning" role="alert">
  {{ session('edit') }}
  </div>
  @endif
  @if (session('tag'))
  <div class="alert alert-primary" role="alert">
  {{ session('tag') }}
  </div>
  @endif
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">posts</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>title</th>
                    <th>image</th>
                    <th >description</th>
                    <th >categore name</th>
                    <th >writer name</th>
                    <th >tags</th>
                    <th >edit</th>
                    <th>add tags</th>
                     <th >delet</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach ($posts as $post)
                    <tr>
                        <th>{{ $loop->index+1 }}</th>
                        <th>{{ $post['title'] }}</th>
                         <th><img style="width:120px ; height:100px ;" src="{{ URL::asset('postimg')."/". $post['img'] }}" alt="photo"></th>
                         <th>{{ $post['desc'] }}</th>
                          <th>{{ $post->cat->title }}</th>
                          <th>{{ $post->user->name }}</th>
                          <th>
                          @foreach ($post->tags as $tag)
                        {{ $tag->title }}
                        <br>
                          @endforeach
                          </th>
                          <th><a class="btn btn-warning" href="{{route('post.edit', $post['id']) }}">edit</a></th>
                          <th><a class="btn btn-block bg-gradient-primary " href="{{ route('post.show',$post['id']) }}">add tags</a></th>
                          <th>    <form action="{{ route("post.destroy",$post['id']) }}" method="POST">
                            @csrf
                            @method("delete")
                            <button class="btn btn-danger" >delet</button>
                        </form></th>
                    </tr>

                    @endforeach


                </tbody>
              </table>
            </div>

          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
</section>
@endsection
