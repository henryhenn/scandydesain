@extends('layouts.dashboard')

@section('title')
    Review Produk
@endsection

@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h3 class="fw-bold">Daftar Review Produk</h3>

        @include('layouts.components.backend.alert')

        <table class="table table-responsive mt-4">
            <thead class="table-secondary">
            <th>Foto</th>
            <th>Judul</th>
            <th>Luas Bangunan</th>
            <th>Fee Desain</th>
            <th>Jumlah Komentar</th>
            <th>Aksi</th>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        @foreach($product->foto->take(1) as $foto)
                            <img src="{{asset('storage/'.$foto->foto)}}" alt="Foto Produk" width="450px"
                                 class="img-fluid rounded">
                        @endforeach
                    </td>
                    <td>{{$product->judul}}</td>
                    <td>{{$product->luas_bangunan}}</td>
                    <td>{{$product->fee_desain}}</td>
                    <td class="fw-bold">{{count($product->review)}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('produk-review.show', $product->id)}}" class="btn btn-success">
                                <i class="tf-icons bx bx-detail"></i>
                            </a>
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
