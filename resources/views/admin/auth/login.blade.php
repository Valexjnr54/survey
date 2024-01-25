@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    
                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ asset('landing_page_assets/img/login-banner.png') }}" class="img-fluid" alt="Doccure Login">	
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Login <span>Doccure</span></h3>
                                </div>
                                <form method="POST" action="{{ route('admin.login.custom') }}">
                                    @csrf
                                    <div class="form-group form-focus" hidden>
                                        <input id="role" type="text" value="Admin" class="form-control floating @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>
                                        <label class="focus-label">Role</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input id="email" type="email" class="form-control floating @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label class="focus-label">Email</label>
                                    </div>
                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <div class="form-group form-focus">
                                        <input id="password" type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <label class="focus-label">Password</label>
                                    </div>
                                    @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @if (Route::has('password.request'))
                                        <div class="text-right">
                                            <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    
                                    
                                    {{-- <div class="text-center dont-have">Don’t have an account? <a href="/register">Register</a></div> --}}
                                </form>
                            </div>
                        </div>
                    </div><br><br>

                    <!-- /Login Tab Content -->
                        
                </div>
            </div>

        </div>

    </div>		
    <!-- /Page Content -->
@endsection 
			