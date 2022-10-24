@extends('dashboard.layout.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>all writers</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">all writers</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
        <a class="btn btn-success" style="width: 100%" href="{{ route("users.create") }}">add writers</a>
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
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">writers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>name</th>
                    <th>email</th>

                    <th >number of posts</th>
                    <th >edit</th>
                     <th >delet</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach ($users as $user)
                    <tr>
                        <th>{{ $loop->index+1 }}</th>
                        <th>{{ $user['name'] }}</th>
                         <th>{{ $user['email'] }}</th>
                          <th><a href="{{ route('users.show',$user['id']) }}">
                            {{ $user->posts->count() }}
                        </a></th>
                          <th><a class="btn btn-warning" href="{{route('users.edit', $user['id']) }}">edit</a></th>
                          <th>    <form action="{{ route("users.destroy",$user['id']) }}" method="POST">
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
