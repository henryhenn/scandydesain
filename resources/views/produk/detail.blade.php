@extends('layouts.dashboard')

@section('title')
    Detail Produk {{$produk->judul}}
@endsection

@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h3 class="fw-bold">Detail Produk {{$produk->judul}}</h3>

        <div class="card rounded rounded-2">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-primary">Detail</h6>
                <a href="{{route('produk.index')}}">Kembali</a>
            </div>
            <div class="card-body">
                @include('layouts.components.backend.alert')

                <div class="row">
                    @foreach($produk->foto as $foto)
                        <div class="col-md-4">
                            <img src="{{asset('storage/' . $foto->foto)}}" alt="Foto Produk" width="300px"
                                 class="d-block rounded img-fluid">
                            <button class="btn btn-danger mt-4 mb-5" data-bs-target="#deleteModal{{$foto->id}}" data-bs-toggle="modal">Hapus</button>
                            <div class="modal fade" id="deleteModal{{$foto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda Yakin Ingin Menghapus Foto Ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                            </button>
                                            <form action="{{route('delete-photo', $foto->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Yakin</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <p>Judul Produk</p>
                        <p>Kategori Produk</p>
                        <p>Ukuran Tanah</p>
                        <p>Luas Bangunan</p>
                        <p>Jumlah Kamar Tidur</p>
                        <p>Jumlah Kamar Mandi</p>
                        <p>Jumlah Toilet Tamu</p>
                        <p>Jumlah Maid Room</p>
                        <p>Jumlah Mobil yang Dapat Ditampung</p>
                        <p>Jumlah Lantai</p>
                        <p>Fee Desain</p>
                    </div>
                    <div>
                        <p class="fw-bold">{{$produk->judul}}</p>
                        <p class="fw-bold">{{$produk->category->name}}</p>
                        <p class="fw-bold">{{$produk->ukuran_tanah}}</p>
                        <p class="fw-bold">{{$produk->luas_bangunan}}</p>
                        <p class="fw-bold">{{$produk->jumlah_kamar_tidur}}</p>
                        <p class="fw-bold">{{$produk->jumlah_kamar_mandi}}</p>
                        <p class="fw-bold">{{$produk->jumlah_toilet_tamu}}</p>
                        <p class="fw-bold">{{$produk->jumlah_maid_room}}</p>
                        <p class="fw-bold">{{$produk->jumlah_mobil_ditampung}}</p>
                        <p class="fw-bold">{{$produk->jumlah_lantai}}</p>
                        <p class="fw-bold">{{$produk->fee_desain}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
