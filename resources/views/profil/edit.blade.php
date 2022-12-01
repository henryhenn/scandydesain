@extends('layouts.dashboard')

@section('title')
    Edit Profil
@endsection

@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h3 class="fw-bold">Edit Profil</h3>

        <form action="{{route('profile.update', auth()->id())}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group mb-3">
                <label for="foto">Foto</label>
                <input type="file" name="foto" multiple id="foto" value="{{old('foto')}}"
                       class="form-control @error('foto') is-invalid @enderror">
                @error('foto')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name"
                       value="{{old('name', auth()->user()->name)}}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="no_telp">No. Telpon</label>
                <input type="text" name="no_telp" id="no_telp"
                       value="{{old('no_telp', auth()->user()->no_telp)}}"
                       class="form-control @error('no_telp') is-invalid @enderror">
                @error('no_telp')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="no_telp">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="10"
                          class="form-control @error('alamat')    is-invalid @enderror">{{old('alamat', auth()->user()->alamat)}}</textarea>
                @error('no_telp')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
