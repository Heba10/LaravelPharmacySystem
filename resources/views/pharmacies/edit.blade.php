
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

@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
            <form action="{{ route('pharmacy.update',$pharmacy->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
   
        

 <div class="form-group m-3">
    <label for="exampleInputEmail1">Name</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$pharmacy->name}}">
 </div>


 <div class="form-group m-3">
    <label for="exampleInputPassword1">Email</label>
    <textarea   name="email" class="form-control" >{{$pharmacy->email}}</textarea>
  </div>
  

  <div class="form-group m-3">
    <label for="exampleInputPassword1">National ID</label>
    <textarea   name="national_id" class="form-control" >{{$pharmacy->national_id}}</textarea>
  </div>

 <div class="form-group m-3">
    <label for="exampleInputPassword1">Image</label>
    <div>
    <img src="{{asset('storage/' . $pharmacy->image)}}" alt="image" width="100px" height="100px">
    </div>
</div>    
  <div class="input-group">
    <div class="custom-file">
    <label class="custom-file-label">Upload Image</label>
    <input type ="file"    class="custom-file-input"   name="image">
  </div>
  </div>

  </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
   
    </form>

    <div class="pull-right m-3">
                <a class="btn btn-primary" href="/pharmacy/{{$pharmacy->id}}"> Back</a>
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
 