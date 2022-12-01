@extends('layouts.auth')

@section('title')
    Register
@endsection

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section font-weight-bold">Register | Scandy Desain</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Belum memiliki akun?</h3>
                        <form action="{{route('register')}}" autocomplete="off" enctype="multipart/form-data" class="signin-form" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="file" value="{{old('foto')}}" class="form-control @error('foto') is-invalid @enderror"
                                       placeholder="Nama Lengkap" name="foto">
                                @error('foto')
                                <div class="invalild-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Nama Lengkap" name="name">
                                @error('name')
                                <div class="invalild-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{old('no_telp')}}" class="form-control @error('no_telp') is-invalid @enderror"
                                       placeholder="No. Telpon" name="no_telp">
                                @error('no_telp')
                                <div class="invalild-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{old('alamat')}}" class="form-control @error('alamat') is-invalid @enderror"
                                       placeholder="Alamat Lengkap" name="alamat">
                                @error('alamat')
                                <div class="invalild-feedback">{{$message}}</div>
                                @enderror
                            </div>
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
                                <button type="submit" class="form-control mt-5 btn btn-primary submit px-3">Register
                                </button>
                            </div>
                        </form>
                        <p class="w-100 text-center">Sudah memiliki akun?&nbsp; <a href="{{route('login')}}">Login
                                di sini.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
