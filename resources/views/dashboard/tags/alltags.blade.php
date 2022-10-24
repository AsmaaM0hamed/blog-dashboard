@extends('dashboard.layout.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>all tags</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">all tags</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
        <a class="btn btn-success" style="width: 100%" href="{{ route("tags.create") }}">add tags</a>
            </div>
            </div>
            </div>
        </section>
  </section>
  @if (session('delete'))
  <div class="alert alert-danger" role="alert">
  {{ session('delete') }}
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
              <h3 class="card-title">tags</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>title</th>
                    <th >edit</th>
                     <th >delet</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $loop->index+1 }}</th>
                        <th>{{ $tag['title'] }}</th>

                          </th>
                          <th><a class="btn btn-warning" href="{{ route("tags.edit",$tag['id']) }}">edit</a></th>
                          <th>
                            <form action="{{ route("tags.destroy",$tag['id']) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">delete</button>
                            </form>
                          </th>
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
