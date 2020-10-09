@extends('layout')

@section('body')
<style>
    td,th
    {
        height: 50px; 
        width: 50px;
    
        text-align: center; 
        vertical-align: middle;
    }
</style>



<div class="container-fluid">

    <table class="table table-bordered table-sm">
    
        <thead  style="background-color: rgb(113, 205, 248)">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
                
        @foreach ($orders as $order)
        <tr>
            <td>{{$order->product->name}}</td>
            <td>{{$order->product->price}}</td>
            <td>{{$order->product->category}}</td>
            <td>{{$order->product->description}}</td>     
            <td>{{$order->status}}</td>                    
        </tr>
        @endforeach
                
       
    
    </table>

    <div>
        <form  method="POST" action="{{ url('/admin/'.$user->id) }}">
            @csrf  
    
            <button class="btn btn-md btn-danger" style="margin-left: 5px" type="submit" name="delete">Delete Customer</button>
        </form>
    </div>

</div>    
@endsection






















