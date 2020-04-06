
@extends('admin.layout.blank')

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
            <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Avatar</th>
      <th scope="col">Area</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
  @foreach($Pharmacies as $Pharmacy)
    <tr>
      <th scope="row">{{$Pharmacy->name}}</th>
      <td>{{$Pharmacy->email}}</td>
      <td>{{$Pharmacy->image}}</td>
      <td>{{$Pharmacy->area_id}}</td>
    </tr>
    @endforeach

  </tbody>
</table>


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
 