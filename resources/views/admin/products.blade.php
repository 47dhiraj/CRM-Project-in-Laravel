@extends('layout')

@section('body')



<div class="container">

<div class="row">
	<div class="col-md-12">
		
    
        <h5 style="text-align: center">Products</h5>
		<div class="card card-body">
			
			<table class="table table-sm">
				<tr>
					<th>Product</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    
				</tr>

				@foreach ($products as $product)
				<tr>
					<td>{{$product->name}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>                    
				</tr>
				@endforeach

			</table>
		</div>

		<div class="row">
			<div class="col-12 d-flex justify-content-center pt-4">
				{{ $products->links() }}
			</div>
		</div>
	</div>
	


</div>
</div>


@endsection