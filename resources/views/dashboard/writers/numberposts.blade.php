@extends('dashboard.layout.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>all posts of writer</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">all posts of writer</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->

  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">posts of writer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>name</th>
                    <th > posts titile</th>

                  </tr>
                </thead>
                <tbody>



                    <tr>
                        <th>#</th>
                        <th>{{ $users['name'] }}</th>

                          <th>
                          @foreach ($users->posts as $post)
                        {{ $post->title }}
                        <br>
                          @endforeach
                          </th>

                    </tr>




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
