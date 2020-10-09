@extends('layout')

@section('body')
<br>
{{-- {{ Auth::user()->first_name }} --}}
<div class="row">
	<div class="col-md-6">
		<div class="card card-body">

            <h1>Order your Product</h1>
			<form action="{{route('order.store')}}" method="POST">	
                @csrf
                
                <div>
                    <div>
                        <label for="title">Select Product: </label>
                        <select id="product_id" name="product_id">
                            @foreach ($products as $product)
                                
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>        
                                
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <label for="title">Note : </label>
                    <input type="text" name="note" id="note" ><br>
                    
                </div>
                <br>
                <button style="margin-left: 100px" type="submit" class="btn btn-primary" name="order" value="submit"  placeholder="Add note for Orde"> {{ __('Submit Order') }}</button>
				
			</form>

		</div>
	</div>
</div>
    
@endsection