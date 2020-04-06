@extends('doctors.layout.blank')

@section('content')

    <!-- Main content -->
    <form method="POST" action="{{route('doctors.update',['doctor' => $doctor->id])}}" style="width: 60%; margin: 3rem auto;">
    @csrf
    {{method_field('PUT')}}
    <div class="form-group">
      <label >name</label>
      <input name="name" value="{{$doctor->name}}" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    
    
    <div class="form-group">
      <label >national_id</label>
      <!-- put name to can use it in controler function store -->
      <input name="national_id" value="{{$doctor->national_id}}" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label >password</label>
      <!-- put name to can use it in controler function store -->
      <input name="password" value="{{$doctor->password}}" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label >image</label>
      <!-- put name to can use it in controler function store -->
      <input name="image" value="{{$doctor->image}}" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label >email</label>
      <!-- put name to can use it in controler function store -->
      <input name="email" value="{{$doctor->email}}" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label >is_banned</label>
      <!-- put name to can use it in controler function store -->
      <input name="is_banned" value="{{$doctor->is_banned}}" type="text" class="form-control" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
      <label >pharamcy_id</label>
      <!-- put name to can use it in controler function store -->
      <input name="pharamcy_id"  value="{{$doctor->pharamcy_id}}" type="text" class="form-control" aria-describedby="emailHelp">
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
    



      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  /.content-wrapper
  @endsection