@extends('layouts.frontend')

@section('title')
    Wishlist Saya
@endsection

@section('content')
    <div
        class="hero page-inner overlay"
        style="background-image: url('{{asset('template/frontend/images/hero_bg_1.jpg')}}')"
    >
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    @include('layouts.components.backend.alert')

                    <h1 class="heading" data-aos="fade-up">Wishlist Saya</h1>

                    <nav
                        aria-label="breadcrumb"
                        data-aos="fade-up"
                        data-aos-delay="200"
                    >
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li
                                class="breadcrumb-item active text-white-50"
                                aria-current="page"
                            >
                                Wishlist Saya
                            </li>
                        </ol>
                    </nav>


                </div>
            </div>
        </div>
    </div>

    <div class="section section-properties mt-5">
        <div class="container">
            <div class="row">
                @forelse($wishlists as $wishlist)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="property-item shadow-sm" style="margin-bottom: 160px">
                            <div class="property-content">
                                @foreach($wishlist->product->foto->take(1) as $foto)
                                    <a href="{{route('desain.detail', $wishlist->id)}}" class="img">
                                        <img src="{{asset('storage/' . $foto->foto)}}" alt="Image"
                                             class="rounded mb-3 img-fluid"/>
                                    </a>
                                @endforeach
                                <div class="price mb-2"><span>{{$wishlist->product->fee_desain}}</span></div>
                                <div>
                                    <span class="city d-block mb-3">{{$wishlist->product->judul}}</span>

                                    <div class="specs d-flex mb-4">
                                                <span class="d-block d-flex align-items-center me-3">
                                                  <span class="icon-bed me-2"></span>
                                                      <span class="caption">{{$wishlist->product->jumlah_kamar_tidur}}</span>
                                                </span>
                                        <span class="d-block d-flex align-items-center">
                                                      <span class="icon-bath me-2"></span>
                                                      <span class="caption">{{$wishlist->product->jumlah_kamar_mandi}}</span>
                                                </span>
                                    </div>
                                    <a href="{{route('desain.index')}}?category={{$wishlist->product->category->name}}"
                                       class="d-block mb-2">Kategori: <u>{{$wishlist->product->category->name}}</u></a>
                                    <a href="{{route('desain.index')}}?scenario={{$wishlist->product->scenario->name}}"
                                       class="d-block mb-2">Skenario: <u>{{$wishlist->product->scenario->name}}</u></a>

                                    <div class="row">
                                        <form action="{{route('wishlist.destroy', $wishlist->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn w-100 btn-danger py-2 px-3 mt-4">
                                                Hapus dari Wishlist
                                            </button>
                                        </form>

                                    <a href="{{route('desain.detail', $wishlist->id)}}"
                                       class="btn btn-primary py-2 px-3 mt-4">
                                        See details
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="fw-bold text-center">Tidak ada wishlist terbaru. Mulai tambah produk ke wishlist, yuk!</h3>
                @endforelse
            </div>
        </div>
    </div>
@endsection
