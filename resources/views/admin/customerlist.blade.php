@extends('layout')

@section('body')
{{-- @include('admin.status') --}}


<div class="container">

<div class="row">
	<div class="col-md-12">
		
    
        <h5 style="text-align: center">CUSTOMERS</h5>
		<div class="card card-body">
			
			<table class="table table-sm">
				<tr>
					
					<th>Customer</th>
                    <th>Phone</th>
                    <th>Email</th>
					<th>Order number</th>
					<th>Action</th>
                    
				</tr>

				@foreach ($users as $user)
				<tr>
					<td>{{$user->first_name}} {{$user->last_name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
					<td>{{$user->order->count()}}</td>
					<td>
						<a class="btn btn-md btn-success" href="{{url('/admin/'.$user->id)}}">View</a>
						{{-- <a class="btn btn-md btn-danger" href="#">Delete</a> --}}
					</td>
                    
				</tr>
				@endforeach

			</table>
		</div>

		<div class="row">
			<div class="col-12 d-flex justify-content-center pt-4">
				{{ $users->links() }}
			</div>
		</div>
	</div>
	



</div>


@endsection