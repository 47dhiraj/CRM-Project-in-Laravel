<br>

<div class="row">
	<div class="col">
		<div class="col-md">
			<div class="card text-center text-white  mb-3" id="total-orders">
			  	<div class="card-header">
			  		<h5 class="card-title">Total Orders</h5>
			  	</div>
			  	<div class="card-body">
			    	<h3 class="card-title">{{$total->count()}}</h3>
			  	</div>
			</div>
		</div>
	</div>

	<div class="col">
		<div class="col-md">
			<div class="card text-center text-white  mb-3" id="orders-delivered">
			  	<div class="card-header">
			  		<h5 class="card-title">Orders Delivered</h5>
			  	</div>
			  	<div class="card-body">
			    	<h3 class="card-title">{{$delivered->count()}}</h3>
			  	</div>
			</div>
		</div>
	</div>

	<div class="col">
		<div class="col-md">
			<div class="card text-center text-white  mb-3" id="orders-pending">
			  	<div class="card-header">
			  		<h5 class="card-title">Orders Pending</h5>
			  	</div>
			  	<div class="card-body">
			    	<h3 class="card-title">{{$pending->count()}}</h3>
			  	</div>
			</div>
		</div>
	</div>
</div>