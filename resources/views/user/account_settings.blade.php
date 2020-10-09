@extends('layout')

@section('body')
<style>
    .profile-pic{
        max-width: 200px;
        max-height:200px;
        margin: 0 auto;
        border-radius: 50%;
    }
</style>
<br>
{{-- {{ Auth::user()->first_name }} --}}
<div class="container-fluid">

    <div class="row">
        <div class="col-md-3">
            <div class="card card-body">
                <a class="btn btn-warning" href="{{url('/user/dashboard/')}}"> &#8592; Back to Profile</a>
                <hr>
                <h3 style="text-align: center">Profile Pic</h3>
                <hr>
                {{-- yo talako image source i.e src="/storage/profile_images/{{$user->profile_pic}}"  web page ma dekhina ko lagi  php artisan storage:link  command run garna parcha command line ma --}}
                <img style="width: 150px; height: 170px; margin-left: 50px" src="/storage/profile_images/{{$user->profile_pic}}" alt="Profile Image">
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-body">
                <label style="text-align: center" for="title"><b>Update Details </b></label>
                <hr>
                <br>
                <form  method="POST" action="{{ url('/user/'.$user->id) }}" enctype="multipart/form-data">
                    
                    {{-- @method('PUT')                               --}}
                    @csrf      

                    <div   class="form-group row">
                        <br>
                        <label  style="margin-left: 230px" class="col-md-2" for="title">First Name</label>

                        <div>
                            <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}" placeholder=" First Name " required>
                            <br>
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        <br>
                        <label style="margin-left: 230px" class="col-md-2" for="title">Last Name</label>

                        <div>
                            <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}" placeholder=" Last Name " required>
                            <br>
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        <br>
                        <label style="margin-left: 230px" class="col-md-2" for="title">Email </label>

                        <div>
                            <input type="email" name="email" id="email" value="{{$user->email}}" placeholder=" Email Address " required>
                            <br>
                        </div>
                        
                    </div>
                    
                   

                   
                    <div class="form-group row">
                        <br>
                        <label style="margin-left: 230px" class="col-md-2" for="title">Phone </label>

                        <div>
                            <input type="text" name="phone" id="phone" value="{{$user->phone}}" placeholder=" Phone " required>
                            <br>
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        <label style="margin-left: 230px" class="col-md-2">Image</label>
                        <div>
                            <input type="file" name='image' id='image'>
                        </div>
                    </div>

                    <input style="margin-left: 340px" class="btn btn-primary" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>


</div>    
@endsection