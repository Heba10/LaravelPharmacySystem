
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

          <!-- add your tables or form here -->
            <h1>Change content is here</h1>
            <a href="{{route('orders.create')}}" class="btn btn-success mb-5">ADD ORDER</a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Ordered User Name</th>
                  <th scope="col">Delivering Address</th>
                  <th scope="col">Creation Date</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Is Insured</th>
                  <th scope="col">Status </th>
                  <th scope="col">Actions </th>
                </tr>
              </thead>
              @foreach($orders as $order)
                <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->user ? $order->user->name : 'not exist'}}</td>
                
                  <td>{{$order->delivering_address_id}}</td>
                  <td>{{ $order->created_at }}</td>

                  <td>{{ $order->doctor_id}}</td>
                  <td>{{ $order->is_insured }}</td>
                  <td>{{ $order->Status }}</td>
            
                  @endforeach


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
 