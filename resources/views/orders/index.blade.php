
@extends('orders.layout.blank')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 style="color:red" align="right"><strong>Doctors</strong></h1> <!-- here we can add title to every page -->
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
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Delivering.Address</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Status</th>
                  <th scope="col">Creator.Type</th>
                  <th scope="col">CreateAt</th>
                </tr>
              </thead>
              @foreach($orders as $order)
                <tr>
                <th scope="row">{{ $order->id }}</th>
                  <td>{{ $order->delivering_address_id}}</td>
                  <td>{{ $order->doctor ? $order->doctor->name : 'not exist'}}</td>
                  <td>{{ $order->status_id}}</td>
                  <td>{{ $order->creator_type }}</td>
                  <td>{{ $order->created_at}}</td>

                  <td><form id="Form" method="POST" action="{{route('orders.destroy', ['order' => $order->id])}}" >
            @csrf
            {{method_field('DELETE')}}
            <button type="button" onclick="deleteDoctor({{$order->id}})" class="btn btn-danger btn-sm">Delete</button>
         
         
          </form>
          
          <script>
  function deleteDoctor(id) {
    var Form = document.querySelector(`#Form`);

    var answer = confirm('are you want to delete this Doctor.... ?');

    if(answer) {
      Form.submit();
    }
  }
</script> </td>
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
 