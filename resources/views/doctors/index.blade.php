
@extends('doctors.layout.blank')

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
            <a href="{{route('doctors.create')}}" class="btn btn-success mb-5">Create Doctor</a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">name</th>
                  <th scope="col">national_id</th>
                  <th scope="col">image</th>
                  <th scope="col">email</th>
                  <th scope="col">Created At</th>
                  <th scope="col">is_banned </th>
                </tr>
              </thead>
              @foreach($doctors as $doctor)
                <tr>
                <th scope="row">{{ $doctor->id }}</th>
                  <td>{{ $doctor->name }}</td>
                  <td>{{$doctor->national_id}}</td>
                  <td>{{ $doctor->image }}</td>

                  <td>{{ $doctor->email}}</td>
                  <td>{{ $doctor->created_at }}</td>
                  <td>{{ $doctor->is_banned }}</td>
                
                  <td><a href="{{route('doctors.show',['doctor' => $doctor->id])}}" class="btn btn-primary btn-sm">View Details</a></td>
                
                <td><form id="Form" method="POST" action="{{route('doctors.destroy', ['doctor' => $doctor->id])}}" >
            @csrf
            {{method_field('DELETE')}}
            <button type="button" onclick="deleteDoctor({{$doctor->id}})" class="btn btn-danger btn-sm">Delete</button>
         
         
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

{{ $doctors->links() }}

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
 