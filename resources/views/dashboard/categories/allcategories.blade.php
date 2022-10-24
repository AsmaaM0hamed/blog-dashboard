@extends('dashboard.layout.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>all categories</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">all categories</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
        <a class="btn btn-success" style="width: 100%" href="{{ route("categories.create") }}">add categories</a>
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
              <h3 class="card-title">categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>title</th>
                    <th>image</th>
                    <th >edit</th>
                    <th >delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $cat )
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $cat['title'] }}</td>
                        <td>
                          <img style="width: 150px; height:150px ;" src="{{ URL::asset('categors').'/'.$cat['img'] }}" alt="">
                        </td>
                        <td><a class="btn btn-warning" href="{{ route("categories.edit",$cat['id']) }}">edit</a></td>
                        <td>
                            <form action="{{ route("categories.destroy",$cat['id']) }}" method="POST">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger" >delet</button>
                            </form>

                        </td>
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
