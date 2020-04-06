@extends('admin.layout.blank')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
    <form method="POST" action="{{route('doctors.store')}}">
    @csrf
    <div class="form-group">
      <label >name</label>
      <!-- put name to can use it in controler function store -->
      <input name="name" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label >national_id</label>
      <!-- put name to can use it in controler function store -->
      <input name="national_id" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label >password</label>
      <!-- put name to can use it in controler function store -->
      <input name="password" type="text" class="form-control" aria-describedby="emailHelp">
    </div>

     <div class="form-group">
    <input type="file"  name="image" id="image" class='image'>
    </div>

<div class="form-group">
      <label >email</label>

      <!-- put name to can use it in controler function store -->
      <input name="email" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label >is_banned</label>
      <!-- put name to can use it in controler function store -->
      <input name="is_banned" type="text" class="form-control" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
      <!-- put name to can use it in controler function store -->
    <label for="exampleInputPassword1">Pharmacy Name</label>
    <select name="pharamcy_id" class="form-control">
        @foreach($pharamcys as $pharamcy)  
          <option value="{{$pharamcy->id}}">{{$pharamcy->name}}</option>
        @endforeach
        </select>
        </div>
   
  

         <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    



      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection