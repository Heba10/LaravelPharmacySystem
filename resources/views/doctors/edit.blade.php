@extends('doctors.layout.blank')

@section('content')

    <!-- Main content -->
    <form method="POST" action="{{route('doctors.update',['doctor' => $doctor->id])}}" style="width: 60%; margin: 3rem auto;">
    
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @csrf
    {{method_field('PUT')}}
    <div class="form-group">
      <label >name</label>
      <input name="name" value="{{$doctor->name}}" type="text" class="form-control" aria-describedby="emailHelp">
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
      <!-- put name to can use it in controler function store -->
    <label for="exampleInputPassword1">Pharmacy Name</label>
    <select name="pharmacy_id" class="form-control">
        @foreach($Pharmacys as $pharamcy)  
          <option value="{{$pharamcy->id}}">{{$pharamcy->name}}</option>
        @endforeach
        </select>
        </div>
        <div class="form-group">
    <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
  @endsection