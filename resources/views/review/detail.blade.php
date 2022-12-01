@extends('layouts.dashboard')

@section('title')
    Review Produk: {{$product->judul}}
@endsection

@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h3 class="fw-bold">Review Untuk Produk: {{$product->judul}}</h3>

        @include('layouts.components.backend.alert')

        <table class="table table-responsive mt-4">
            <thead class="table-secondary">
            <th>Username</th>
            <th>Komentar</th>
            <th>Status</th>
            <th>Tanggal Komentar Dipost</th>
            <th>Aksi</th>
            </thead>
            <tbody>
            @forelse($product->review as $review)
                <tr>
                    <td>{{$review->user->name}}</td>
                    <td>{{$review->ulasan}}</td>
                    <td>
                        <span class="badge px-3 py-2 bg-{{$review->status == 'Diblokir' ? 'danger' : 'primary'}}">
                            {{$review->status ?? 'OK'}}
                        </span>
                    </td>
                    <td>{{$review->created_at}} || {{$review->created_at->diffForHumans()}}</td>
                    <td><!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#blokir{{$review->id}}" @disabled($review->status == 'Diblokir')>
                            Blokir
                        </button>

                        <div class="modal fade" id="blokir{{$review->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <!-- Modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda Yakin Ingin Memblokir Komentar dari <span
                                            class="font-weight-bold">{{$review->user->name}}</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <form action="{{route('produk-review.update', $review->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-danger">
                                                Blokir Komentar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <h5 class="text-center">Tidak ada data review produk terkini</h5>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
