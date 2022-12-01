@extends('layouts.frontend')

@section('title')
    Detail Desain
@endsection

@section('content')
    <div
        class="hero page-inner overlay"
        style="background-image: url('{{asset('template/frontend/images/hero_bg_3.jpg')}}')"
    >
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    @include('layouts.components.backend.alert')

                    <h1 class="heading" data-aos="fade-up">
                        {{$product->judul}}
                    </h1>

                    <nav
                        aria-label="breadcrumb"
                        data-aos="fade-up"
                        data-aos-delay="200"
                    >
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{route('desain.index')}}">Seluruh Desain</a>
                            </li>
                            <li
                                class="breadcrumb-item active text-white-50"
                                aria-current="page"
                            >
                                {{$product->judul}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="img-property-slide-wrap">
                        <div class="img-property-slide">
                            @foreach($product->foto as $foto)
                                <img src="{{asset('storage/' . $foto->foto)}}" alt="Image" class="img-fluid"/>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2 class="heading text-primary fw-bold">{{$product->judul}}</h2>
                    <p class="meta">Kategori: <span class="fw-bold">{{$product->category->name}}</span></p>
                    <p class="meta">Skenario: <span class="fw-bold">{{$product->scenario->name}}</span></p>
                    <p class="text-black-50">Ukuran Tanah: <span class="fw-bold">{{$product->ukuran_tanah}}</span></p>
                    <p class="text-black-50">Luas Bangunan: <span class="fw-bold">{{$product->luas_bangunan}}</span></p>
                    <p class="text-black-50">Jumlah Kamar Tidur: <span
                            class="fw-bold">{{$product->jumlah_kamar_tidur}}</span></p>
                    <p class="text-black-50">Jumlah Kamar Mandi: <span
                            class="fw-bold">{{$product->jumlah_kamar_mandi}}</span></p>
                    <p class="text-black-50">Jumlah Toilet Tamu: <span
                            class="fw-bold">{{$product->jumlah_toilet_tamu}}</span></p>
                    <p class="text-black-50">Jumlah Maid Room: <span
                            class="fw-bold">{{$product->jumlah_maid_room}}</span></p>
                    <p class="text-black-50">Jumlah Mobil yang Bisa Ditampung: <span
                            class="fw-bold">{{$product->jumlah_mobil_ditampung}}</span></p>
                    <p class="text-black-50">Jumlah Lantai: <span class="fw-bold">{{$product->jumlah_lantai}}</span></p>
                    <p class="text-black-50">Fee Desain: <span class="fw-bold">{{$product->fee_desain}}</span></p>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn my-4 btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                        Pesan Desain
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="p-3">Dengan meng-klik tombol "Buat Pesanan" di bawah, Anda telah
                                        menyetujui dan
                                        menerima untuk melakukan pemesanan desain <span
                                            class="fw-bold">{{$product->judul}}</span></h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <form action="{{route('orders.store')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="user_id" id="user_id" value="{{auth()->id()}}">
                                        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <div class="col-lg-8">
                    <h3 class="fw-bold text-center"> Review Terkait Desain</h3>
                    <h5 class="mt-3 text-center">Berikan Tanggapan Anda Terkait Desain Ini</h5>
                    @auth
                        <form action="{{route('produk-review.store')}}" method="post" class="mt-4">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="user_id" value="{{auth()->id()}}">
                            <div class="form-group mb-3">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" disabled id="name" value="{{auth()->user()->name}}"
                                       class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="rating">Rating (1-5)</label>
                                <input type="number" max="5" min="1" name="rating" id="rating" value="{{old('rating')}}"
                                       class="form-control @error('rating') is-invalid @enderror"
                                    @error('rating')>
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="ulasan">Ulasan Anda</label>
                                <textarea name="ulasan" id="ulasan" rows="10"
                                          class="form-control @error('ulasan') is-invalid @enderror">{{old('ulasan')}}</textarea>
                                @error('ulasan')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-5">Submit Ulasan</button>
                        </form>
                    @else
                        <h6 class="mt-4 text-center">Silakan Login Terlebih Dahulu Untuk Memberi Review</h6>
                    @endauth
                </div>
            </div>

            <div class="row justify-content-center mt-3 mb-5">
                <div class="col-lg-8">
                    <h3 class="fw-bold text-center"> Komentar Terbaru</h3>
                    <p class="mt-3 text-center">Komentar yang ditampilkan adalah komentar yang tidak diblokir</p>

                    @forelse($product->review as $review)
                        <div class="card rounded border mb-4">
                            <div class="card-body">
                                @if($review->status !== 'Diblokir')
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{asset('storage/' . $review->user->foto)}}"
                                                 class="img-fluid rounded-circle" width="150px" alt="">
                                        </div>
                                        <div class="col-7">
                                            <div class="d-flex justify-content-between pe-5">
                                                <p class="fw-bold">{{$review->user->name}}</p>
                                                <p>{{$review->rating}}/5</p>
                                            </div>

                                            <p>{{$review->ulasan}}</p>
                                        </div>
                                    </div>

                                    @if($review->user_id == auth()->id())
                                        <div class="row mt-4">
                                            <div class="d-flex">
                                                <form action="{{route('produk-review.destroy', $review->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"><span
                                                            class="icon-trash"></span></button>
                                                </form>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn ms-3 btn-warning text-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{$review->id}}">
                                                    <span class="icon-edit"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="editModal{{$review->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                            Komentar
                                                            Anda</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('produk-review.update', $review->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-body">
                                                            <input type="hidden" name="user_id"
                                                                   value="{{auth()->id()}}">
                                                            <input type="hidden" name="product_id"
                                                                   value="{{$review->product->id}}">
                                                            <div class="form-group mb-3">
                                                                <label for="rating">Rating</label>
                                                                <input type="text" value="{{$review->rating}}"
                                                                       name="rating"
                                                                       id="rating"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="ulasan">Ulasan</label>
                                                                <textarea name="ulasan" id="ulasan" cols="30" rows="10"
                                                                          class="form-control">{{$review->ulasan}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">Batal
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @else
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{asset('storage/' . $review->user->foto)}}"
                                                 class="img-fluid rounded-circle" width="150px" alt="">
                                        </div>
                                        <div class="col-7">
                                            <div class="d-flex justify-content-between pe-5">
                                                <p class="fw-bold">{{$review->user->name}}</p>
                                            </div>

                                            <p class="fw-bold">Komentar ini diblokir</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <h6 class="text-center">Tidak ada komentar terbaru.</h6>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
