@extends('layouts.auth')
@section('content')
<section class="section">
    <div class="container mt-1">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                {{-- <div class="login-brand">
                   <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div> --}}
                <div class="login-brand">
                    <h3 class="pt-4">
                        <a href="{{url('/')}}" style="text-decoration:none;">
                            {!! name_app() !!}
                        </a>
                    </h3>
                </div>
                {{ alertbs_form($errors) }}
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="text-center mb-3">Sign in to start your session</div>
                        <form method="POST" action="{{ route('login') }}" 
                            class="needs-validation" 
                            novalidate="">
                            @csrf
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" 
                                    required autocomplete="off" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="float-right">
                                        @if (Route::has('password.request'))
                                            <a class="text-small" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" 
                                            class="custom-control-input" 
                                            {{ old('remember') ? 'checked' : '' }}  
                                            id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                        <p class="text-center">
                            Copyright &copy; Codekop Developer {{date('Y')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
