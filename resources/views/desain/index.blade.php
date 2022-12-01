@extends('layouts.frontend')

@section('title')
    Desain Kami
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

                    <h1 class="heading" data-aos="fade-up">Desain Kami</h1>

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

                    <div class="mt-5">
                        <form
                            action="{{route('desain.index')}}"
                            class="narrow-w form-search d-flex align-items-stretch mb-3"
                            data-aos="fade-up"
                            data-aos-delay="200"
                        >
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{request('category')}}">
                            @endif
                            <input
                                type="text"
                                name="search"
                                value="{{request('search')}}"
                                class="form-control px-4"
                                placeholder="Temukan desain impianmu dari sini..."
                            />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-properties mt-5">
        <div class="container">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="property-item shadow-sm" style="margin-bottom: 160px">
                            <div class="property-content">
                                @foreach($product->foto->take(1) as $foto)
                                    <a href="{{route('desain.detail', $foto->id)}}" class="img">
                                        <img src="{{asset('storage/' . $foto->foto)}}" alt="Image"
                                             class="rounded mb-3 img-fluid"/>
                                    </a>
                                @endforeach
                                <div class="price mb-2"><span>{{$product->fee_desain}}</span></div>
                                <div>
                                    <span class="city d-block mb-3">{{$product->judul}}</span>

                                    <div class="specs d-flex mb-4">
                                                <span class="d-block d-flex align-items-center me-3">
                                                  <span class="icon-bed me-2"></span>
                                                      <span class="caption">{{$product->jumlah_kamar_tidur}}</span>
                                                </span>
                                        <span class="d-block d-flex align-items-center">
                                                      <span class="icon-bath me-2"></span>
                                                      <span class="caption">{{$product->jumlah_kamar_mandi}}</span>
                                                </span>
                                    </div>
                                    <a href="{{route('desain.index')}}?category={{$product->category->name}}"
                                       class="d-block mb-2">Kategori: <u>{{$product->category->name}}</u></a>
                                    <a href="{{route('desain.index')}}?scenario={{$product->scenario->name}}"
                                       class="d-block mb-2">Skenario: <u>{{$product->scenario->name}}</u></a>

                                    <div class="row">
                                        <form action="{{route('wishlist.store')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button type="submit"
                                                    class="btn w-100 btn-outline-primary py-2 px-3 mt-4">
                                                Tambahkan ke Wishlist Saya
                                            </button>
                                        </form>

                                        <a href="{{route('desain.detail', $product->id)}}"
                                           class="btn btn-primary py-2 px-3 mt-4">
                                            See details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="fw-bold text-center">Tidak ada desain terbaru. Silakan Coba Lagi Nanti!</h3>
                @endforelse
            </div>
            <div class="row align-items-center py-5">
                <div class="col-lg-6 text-center">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
