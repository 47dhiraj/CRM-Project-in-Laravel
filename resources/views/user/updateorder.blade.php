@extends('layout')

@section('body')
<br>


    <div style="width:50% " class="container my-3">          {{-- Jahile pani div element ko class="container" ko kam vaneko tyo div element vitra vako content lai left ma 100px jati margin codera & right ma 100 px jati margin chodera display garaunxa......Yo line ko my-3 vannale top batw margin 3 de vaneko --}}

        
        <form action="{{ url('/order/'.$order->id) }}" method="post">
                
                @method('PUT')                              {{-- You can either write the hidden input field yourself or with Laravel 7 you have option of generating it via @method(PUT) function. --}}
                @csrf                                       {{-- It include a hidden validated CSRF token in the form, so that the CSRF protection middleware of Laravel can validate the request.    --}}

                <label for="title">Select Product: </label>
                <select id="product_id" name="product_id" required>
                    @foreach ($products as $product)
                        
                            <option value="{{ $product->id }}">{{ $product->name }}</option>        
                        
                    @endforeach
                </select>

                <br>
                    <label for="title">Note : </label>
                    <input type="text" name="note" id="note" value="{{$order->note}}" placeholder="Add note for Orde"><br>

                <button class="btn btn-primary" type="submit" name="update" id="update">{{ __('Update Order') }}</button>
    
        </form>     

        

    </div>

    
@endsection