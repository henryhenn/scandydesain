@extends('layouts.dashboard')

@section('title')
    Daftar Produk
@endsection

@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h3 class="fw-bold">Daftar Seluruh Produk</h3>

        @include('layouts.components.backend.alert')

        <table class="table table-responsive mt-4">
            <thead class="table-secondary">
            <th>Foto</th>
            <th>Judul Produk</th>
            <th>Luas Bangunan</th>
            <th>Jumlah Kamar Tidur</th>
            <th>Jumlah Lantai</th>
            <th>Fee Desain</th>
            <th>Aksi</th>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        @foreach($product->foto->take(1) as $foto)
                        <img src="{{asset('storage/'.$foto->foto)}}" alt="Foto Produk" width="450px"
                             class="img-fluid">
                        @endforeach
                    </td>
                    <td>{{$product->judul}}</td>
                    <td>{{$product->luas_bangunan}}</td>
                    <td>{{$product->jumlah_kamar_tidur}}</td>
                    <td>{{$product->jumlah_lantai}}</td>
                    <td>{{$product->fee_desain}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('produk.show', $product->id)}}" class="btn btn-success">
                                <i class="tf-icons bx bx-detail"></i>
                            </a>
                            <a href="{{route('produk.edit', $product->id)}}" class="btn btn-warning mx-3">
                                <i class="tf-icons bx bx-message-square-edit"></i>
                            </a>
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{$product->id}}">
                                <i class="tf-icons bx bx-trash"></i>
                            </button>

                            <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda Yakin Ingin Menghapus Produk Ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <form action="{{route('produk.destroy', $product->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Yakin</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        <h5 class="text-center">Tidak ada data produk terkini</h5>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{$products->links()}}
    </div>
@endsection
