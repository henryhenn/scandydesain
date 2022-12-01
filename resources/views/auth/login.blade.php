@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section font-weight-bold">Login | Scandy Desain</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Sudah memiliki akun?</h3>
                        @include('layouts.components.alert')

                        <form action="{{route('login')}}" class="signin-form" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Email" name="email">
                                @error('email')
                                <div class="invalild-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password"
                                       name="password">
                                @if($errors->password)
                                @else
                                    <span toggle="#password-field"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                @endif

                                @error('password')
                                <div class="invalild-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control mt-5 btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" name="remember" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center">Belum memiliki akun?&nbsp; <a href="{{route('register')}}">Register
                                di sini.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
