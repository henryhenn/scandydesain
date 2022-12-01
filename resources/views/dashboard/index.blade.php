@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="col-lg-8 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat datang, {{auth()->user()->name}}!</h5>
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
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img
                                    src="{{asset('template/backend/assets/img/icons/unicons/chart-success.png')}}"
                                    alt="chart success"
                                    class="rounded"
                                />
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt3"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Produk Terbaru</span>
                        <h3 class="card-title mb-2">{{$recent_products}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img
                                    src="{{asset('template/backend/assets/img/icons/unicons/chart-success.png')}}"
                                    alt="chart success"
                                    class="rounded"
                                />
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn p-0"
                                    type="button"
                                    id="cardOpt3"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Ulasan Produk Terbaru</span>
                        <h3 class="card-title mb-2">{{$recent_review}}</h3>
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
                        <h5 class="card-header m-0 me-2 pb-3">Daftar Produk Terbaru</h5>
                        <a href="{{route('produk.index')}}" class="pb-3 mt-4">Lihat lebih banyak</a>
                    </div>
                    <table class="table ms-4 mt-4 table-responsive table-primary">
                        <thead>
                        <th>Foto</th>
                        <th>Ukuran Tanah</th>
                        <th>Luas Bangunan</th>
                        <th>Jumlah Kamar Tidur</th>
                        <th>Jumlah Lantai</th>
                        <th>Fee Desain</th>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    @foreach($product->foto->take(1) as $foto)
                                        <img src="{{asset('storage/' . $foto->foto)}}" width="300px" alt=""
                                             class="img-fluid rounded">
                                    @endforeach
                                </td>
                                <td>{{$product->ukuran_tanah}}</td>
                                <td>{{$product->luas_bangunan}}</td>
                                <td>{{$product->jumlah_kamar_tidur}}</td>
                                <td>{{$product->jumlah_lantai}}</td>
                                <td>{{$product->fee_desain}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <h4 class="text-center">Tidak ada data terkini</h4>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
