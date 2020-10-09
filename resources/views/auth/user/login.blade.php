{{-- @extends('layouts.app') --}}

@extends('layout')

@section('body')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Login') }}</div>

                <div class="card-body">
                    @if(session('status'))
                        {{-- <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> --}}

                        <script>
                            swal( "One more Step!" ,  "{!! session('status') !!}" ,  "success" );
                        </script>
                    @endif
                    
                    @if (session('activated'))
                        {{-- <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> --}}
                        <script>
                            swal( "Let's dig in !" ,  "{!! session('activated') !!}" ,  "success" )
                        </script>

                    @endif

                    {{-- @if(session('error'))

                        <script>
                            swal( "Oops!" ,  "{!! session('error') !!}" ,  "error" );
                        </script>

                    @endif --}}

                    @if(session('error'))

                        <script>
                            swal({
                                title:"Your account is yet to active!",
                                text: "Want the code again ? If yes, click OK",
                                type:"error",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                                },
                                function(){
                                    setTimeout(function(){
                                        $.get('/resend/code',{email: "{!! session('error')!!}" });
                                        swal("Email sent!");
                                    },2000);
                                }
                            );
                        </script>
                    @endif


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection