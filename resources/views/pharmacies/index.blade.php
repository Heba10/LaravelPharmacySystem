
@extends('admin.layout.blank')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color:red" align="right"><strong>Pharmacies</strong></h1> <!-- here we can add title to every page -->
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
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">National.ID</th>
      <th scope="col">Area.ID</th>
      <th scope="col">Priority</th>
      <th scope="col">Email</th>
      <th scope="col">Image</th>
      <th scope="col">View</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>


    </tr>
  </thead>
  <tbody> 

  @foreach( $Pharmacies  as $pharmacy)
  <th scope="row">{{$pharmacy->id}}</th>
      <td>{{$pharmacy->name}}</td>
      <td>{{$pharmacy->national_id}}</td>
      <td>{{$pharmacy->area_id}}</td>
      <td>{{$pharmacy->priority}}</td>
      <td>{{$pharmacy->email}}</td>
      <td><img src="{{asset('storage/' . $pharmacy->image)}}" alt="image" width="100px" height="100px"></td>


      <td><a href="/pharmacy/{{$pharmacy->id}}" class="btn btn-success btn-sm">view</a></td>
      <td><a href="/pharmacy/{{$pharmacy->id}}/edit" class="btn btn-primary btn-sm">Edit</a></td>
      @csrf
  
      {{method_field('DELETE')}}
      <td><a   onclick="return confirm('Are you sure you want to delete this pharmacy ({{$pharmacy->name}})?')" href="/pharmacy/{{$pharmacy->id}}/delete" class="btn btn-danger btn-sm" >delete</a></td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
 
 