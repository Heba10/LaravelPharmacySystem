@extends('admin.layout.blank')

@section('content')

<div class="table-responsive">

<table class="table table-bordered table-striped" id="revenue_table">
  <thead>
    <tr>
      <th scope="col">PharmacyImage</th>
      <th scope="col">PharmacyName</th>
      <th scope="col">TotalOrders</th>
      <th scope="col">TotalRevenue</th>
    </tr>
  </thead>
</table>
</div>
@section('script')


  <script>
$(document).ready(function(){

 $('#revenue_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:'{{route('revenue.index') }}',
  
               columns: [
                        { data: 'image', name: 'image' ,
                          render: function(data, type, full, meta){
                           return "<img src=/images/" + data + " alt='image' height='42' width='42' />";}},
                        { data: 'name', name: 'name' },
                       
                        
                     ],
            });
         });
  </script>
@endsection
@endsection
