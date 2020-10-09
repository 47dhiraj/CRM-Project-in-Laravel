{{-- @extends('layouts.app') --}}

@extends('layout')

@section('body')

<div class="container-fluid">
<br>

    {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}

    @if (session('status'))
        <script>
            swal( "Sucess! " ,  "{!! session('status') !!}" ,  "success" )
        </script>

    @endif


    {{-- @if( auth()->user()->role_id == 2) --}}
    {{-- @if( auth()->user()->role->nickname == 'user')
        <p>Role : User</p>
    @else
        <p>Role : Admin</p>
    @endif --}}


    

    <div class="row">
        <div class="col-md-4">
            <div class="card card-body" style="background-color: #efe9f0;">
                <h4>Take Action</h4>
                <hr>
                <a class="btn btn-outline-info  btn-sm btn-block " href="{{ route('user.settings') }}">Update Customer</a>
                <a class="btn btn-outline-info  btn-sm btn-block" href="{{route('order.create')}}">Place Order</a>
    
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="card card-body" style="background-color: #60e2b7;">
                <h4>Contact</h4>
                <hr>
                <span>Email: <b>{{ $user->email }}</b></span>
                <br>
                <span>Phone: <b>{{ $user->phone }}</b></span>
            </div>
        </div>
    
        <div  class="col-md-4">
            <div class="card card-body" style="background-color: #4cbbbb;">
                <h5>Total Orders</h5>
                <hr>
                <br>
                <h1 style="text-align: center;">{{ $count }}</h1>
            </div>
        </div>
    </div>
    
    
    {{-- <br>
    <div class="row">
        <div class="col">
            <div class="card card-body">
    
                <form method="get">		
                        
    
                <button class="btn btn-primary" type="submit">Search</button>
              </form>
    
            </div>
        </div>
        
    </div>
    <br> --}}
    @include('user.search')
    
    <div class="row">
        <div class="col-md">
            <div class="card card-body">
                <table class="table table-sm">
                    <tr>
                        <th>Product</th>
                        <th>Note</th>
                        <th>Date Orderd</th>
                        <th>Status</th>
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>
    
                    
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->note }}</td>
                            <td>{{ $order->ordered_at }}</td>
                            <td>{{ $order->status }}</td>
                        
                            <td>
                                <form action="{{url('/order/'.$order->id)}}" method="post">     {{-- Yo  action="{{url('/todos/'.$item->id_todo)}}"  ko khaam vaneko khas Delete chai yo form ko submit button ho so, jaba delete button click hunxa taba yo action ma vayeko url ma  id_todo as parameter liyera janxa . --}}

                                    {{ method_field('DELETE') }}           {{-- You can either write the hidden input field yourself or with Laravel 7 you have option of generating it via method_field() function. --}}
                                    {{ csrf_field() }}                     {{-- It include a hidden validated CSRF token in the form, so that the CSRF protection middleware of Laravel can validate the request.    --}}
            
                                    
                                    <a href="{{url('/order/'.$order->id.'/edit/')}}" class="btn btn-primary" style="padding-left:25px; ">Edit</a>
                                    <td>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </td>   
            
                                </form>
                            </td>
                        </tr>                                    
                    @endforeach
    
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
