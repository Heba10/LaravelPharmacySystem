@extends('pharmacies.layout.blank')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pharmacy</h1> <!-- here we can add title to every page -->
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
    
<div class="pull-right m-3">
<h1 style="color:red">Create Pharmacy</h1>
</div>
@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<form method="POST" action="/pharmacy"  enctype="multipart/form-data">
@csrf
  <div class="form-group m-3">
    <label for="exampleInputEmail1">Name</label>
    <input name="name"  class="form-control"  aria-describedby="emailHelp">
  </div>
  <div class="form-group m-3">
    <label for="exampleInputPassword1">password</label>
    <input name="password" class="form-control"></textarea>
  </div>
  <div class="form-group m-3">
    <label for="exampleInputPassword1">Email</label>
    <input name="email" class="form-control" aria-describedby="emailHelp">
  </div>
  <div class="form-group m-3">
    <label for="exampleInputPassword1">Area ID</label>
    <textarea name="area_id" class="form-control"></textarea>
  </div>
  <div class="form-group m-3">
    <label for="exampleInputPassword1">Priority</label>
    <textarea name="priority" class="form-control"></textarea>
  </div>
  <div class="form-group m-3">
    <label for="exampleInputPassword1">National ID</label>
    <textarea name="national_id" class="form-control"></textarea>
  </div>
  <div class="input-group m-3">
    <div class="custom-file">
    <label class="custom-file-label">Upload Image</label>
    <input type="file"    class="custom-file-input"   name="image">
  </div>
  </div>
  
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success" >Create Pharmacy</button>
            </div>
  </form>
  
           
    <div class="pull-right m-3">
                <a class="btn btn-primary" href="/posts"> Back</a>
            </div>
        </div>
    </div> 
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection