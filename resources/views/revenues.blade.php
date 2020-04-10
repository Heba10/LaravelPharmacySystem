@extends('admin.layout.blank')

@section('content')
<div class="container">    
<div class="card text-center bg- p-0">
  <div class="card-body p-2">
    <h3>Pharmacies Total Revenue is {{$pharmacies_total}}</h3>
  </div>
</div>
<div class="table-responsive">

<table class="table table-bordered table-striped" id="revenue_table">
  <thead>
    <tr>
      <th scope="col">PharmacyAvatar</th>
      <th scope="col">PharmacyName</th>
      <th scope="col">TotalOrders</th>
      <th scope="col">TotalRevenue</th>
    </tr>
  </thead>
</table>
</div>
</div>

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
                        { data: 'TotalOrders', name: 'TotalOrders' },
                        { data: 'TotalRevenue', name: 'TotalRevenue' },
                        { data: 'action', name: 'action', orderable: false },

                        
                     ],
            });
         });
  </script>
 
@endsection