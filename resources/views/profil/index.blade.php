@extends('layouts.dashboard')

@section('title')
    Profil Saya
@endsection

@section('content')
    <div class="col-lg-10 mb-4 order-0">
        @include('layouts.components.backend.alert')

        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat datang di halaman profil, {{auth()->user()->name}}
                            !</h5>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img
                            src="{{asset('template/backend/assets/img/illustrations/man-with-laptop-light.png')}}"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Revenue -->
    <div class="col-12 col-lg-10 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <div class="row row-bordered g-0">
                <div class="col-md-11 pb-5">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header m-0 me-2 pb-3">Profil Saya</h5>
                        <a href="{{route('profile.edit')}}" class="pb-3 mt-4">Edit Data Diri</a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            @if(auth()->user()->foto)
                                <img src="{{asset('storage/' . auth()->user()->foto)}}" alt="" width="300px"
                                     class="img-fluid rounded mb-4">
                            @else
                                <h6 class="text-center fw-bold mb-4">Anda tidak memiliki foto profil</h6>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Nama Lengkap</p>
                                <p>Email</p>
                                <p>Alamat</p>
                                <p>No. Telpon</p>
                            </div>
                            <div>
                                <p class="fw-bold">{{auth()->user()->name}}</p>
                                <p class="fw-bold">{{auth()->user()->email}}</p>
                                <p class="fw-bold">{{auth()->user()->alamat}}</p>
                                <p class="fw-bold">{{auth()->user()->no_telp}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
