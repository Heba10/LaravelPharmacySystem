@extends('admin.layout.blank')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Doctors Page</h1> <!-- here we can add title to every page -->
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
      <div class="card" style="width: 25rem;">
        <div class="card-body">
        <h5 class="card-title">{{ $doctor->name }}</h5>
          <p class="card-text">{{$doctor->national_id}}</p>
          <td><img src="{{asset('storage/' . $doctor->image)}}" alt="image" width="300px" height="150px"></td>
          <p class="card-text">{{ $doctor->email}}</p>
          <label style="color: red;">Manager status ban or not: </label>
                  <br>
                   @if ($ban ==1)
                   <td><a href="/ban/{{$doctor->id}}" class="btn btn-primary btn-sm">UNBAN</a></td>
                  @endif
                  @if ($unban ==1)
                  <td><a href="/unban/{{$doctor->id}}" class="btn btn-primary btn-sm">BAN</a></td>
                   <br>
                  @endif
        </div>
      </div>
    



      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection