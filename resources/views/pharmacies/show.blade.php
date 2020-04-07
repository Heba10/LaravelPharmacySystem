
@extends('pharmacies.layout.blank')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pharmacy Page</h1> <!-- here we can add title to every page -->
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

          <!-- add your tables or form here -->
            <h1>Change content is here</h1>
            <div class="card mb-3" style="max-width: 1000px;">
  <div class="row no-gutters">
    <div class="col-md-6">
      <img src=" {{ asset($pharmacy->image) }}" class="card-img" alt="image">
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title">{{$pharmacy->name}}</h5>
        <h5 class="card-title">{{$pharmacy->image}}</h5>

        <p class="card-text">Email: {{$pharmacy->email}}</p>
        <p class="card-text">Password : {{$pharmacy->password}}</p>
        <p class="card-text">National ID : {{$pharmacy->national_id}}</p>
        <a href="/pharmacy/{{$pharmacy->id}}/edit" class="btn btn-primary ">Edit</a>
        <a href="#" class="btn btn-danger">Delete</a>


      </div>
    </div>
  </div>
</div>
</div>


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
 