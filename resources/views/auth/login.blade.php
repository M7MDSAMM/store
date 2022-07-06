@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            @error('email')

            <div class="alert alert-danger">
                {{ $message }}

            </div>
                        {{-- <span class="invalid-feedback" role="alert"> --}}
                            {{-- <strong></strong> --}}
                            {{-- {{ $message }} --}}
                        {{-- </span> --}}
                    @enderror

            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control" placeholder="Email"
                        @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>



                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{ route('password.update') }}">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- jQuery -->
        <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>

@endsection
