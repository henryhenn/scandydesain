@extends('layouts.dashboard')

@section('title')
    Daftar Order
@endsection

@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h3 class="fw-bold">Daftar Seluruh Order</h3>

        @include('layouts.components.backend.alert')

        <table class="table table-responsive mt-4">
            <thead class="table-secondary">
            <th>Judul Produk</th>
            <th>Skenario</th>
            <th>Kategori</th>
            <th>Nama Pembeli</th>
            <th>No. Telpon</th>
            <th>Alamat</th>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{$order->product->judul}}</td>
                    <td>{{$order->product->scenario->name}}</td>
                    <td>{{$order->product->category->name}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->user->no_telp}}</td>
                    <td>{{$order->user->alamat}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <h5 class="text-center">Tidak ada data order produk terkini</h5>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
