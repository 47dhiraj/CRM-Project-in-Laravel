@extends('layout')

@section('body')
@include('admin.status')

<div>
	<form action="{{ route('admin.order') }}" method="get" class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-4" >
		<i class="fa fa-search" aria-hidden="true"></i>
		<input class="form-control form-control-nd ml-3 w-50" name='query' id ='query' value="{{request()->input('query')}}" type="text" placeholder="  Search for Status of Product">
		 
	</form>
</div>
<br>

<div class="container">
	
<div class="row">
	<div style="mar" class="col-md-12">
		
        <h5 style="text-align: center">LATEST ORDERS</h5>
		<div class="card card-body">
			
			

			
					<table class="table table-sm">
						<tr>
							<th>Product</th>
							<th>Orderd By</th>
							<th>Date Orderd</th>
							<th>Status</th>
							<th>Update</th>
							<th>Remove</th>
						</tr>
						@foreach ($orders as $order)
							<tr>
								<td>{{$order->product->name}}</td>
								<td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
								<td>{{$order->ordered_at}}</td>
								<td>{{$order->status}}</td>
								<td><a class="btn btn-sm btn-info" href="#">Update</a></td>

								<td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>

							</tr>
						@endforeach
					</table>

					<div class="row">
						<div class="col-12 d-flex justify-content-center pt-4">
							{{ $orders->links() }}
						</div>
					</div>

					
				

		
			
		</div>

		

	</div>

</div>


</div>


@endsection