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
    <form method="POST" action="{{route('orders.store')}}">
    @csrf
  

    <div class="form-group">
      <!-- put name to can use it in controler function store -->
    <label for="exampleInputPassword1">User Name</label>
    <select name="pharamcy_id" class="form-control">
        @foreach($users as $user)  
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
        </div>


        <div class="form-group">
      <label >Delivering Address</label>
      <input name="delivering_address_id" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
  
    <div class="form-group">
      <label >Doctor Name</label>
      <input name="doctor_id" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
  
    <div class="form-group">
      <label >Is Insured</label>
      <input name="is_insured" type="text" class="form-control" aria-describedby="emailHelp">
    </div>


    <div class="form-group">
      <label >Status</label>
      <input name="status_id" type="text" class="form-control" aria-describedby="emailHelp">
    </div>



         <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    



      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection