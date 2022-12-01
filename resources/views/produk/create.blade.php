@extends('layouts.dashboard')

@section('title')
    Tambah Produk Baru
@endsection

@section('content')
    <div class="col-lg-12 mb-4 order-0">
        <h3 class="fw-bold">Tambah Produk Baru</h3>
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
        <form action="{{route('produk.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="foto">Foto Produk</label>
                <input type="file" name="foto[]" multiple id="foto" value="{{old('foto')}}"
                       class="form-control @error('foto') is-invalid @enderror">
                @error('foto')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="product_categories_id">Kategori Produk</label>
                <select name="product_categories_id" id="product_categories_id"
                        class="form-select @error('product_categories_id') is-invalid @enderror">
                    @forelse($categories as $scenario)
                        <option value="{{$scenario->id}}">{{$scenario->name}}</option>
                    @empty
                        <option value="" disabled selected>Tidak ada kategori terbaru</option>
                    @endforelse
                </select>
                @error('product_categories_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="product_scenario_id">Kategori Produk</label>
                <select name="product_scenario_id" id="pproduct_scenario_id"
                        class="form-select @error('pproduct_scenario_id') is-invalid @enderror">
                    @forelse($scenarios as $scenario)
                        <option value="{{$scenario->id}}">{{$scenario->name}}</option>
                    @empty
                        <option value="" disabled selected>Tidak ada scenario terbaru</option>
                    @endforelse
                </select>
                @error('product_scenario_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="ukuran_tanah">Deskripsikan Ukuran Tanah (misal: Lebar Depan 20 m x Panjang 56 m)</label>
                <input type="text" name="ukuran_tanah" id="ukuran_tanah" value="{{old('ukuran_tanah')}}"
                       class="form-control @error('ukuran_tanah') is-invalid @enderror">
                @error('ukuran_tanah')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="judul">Judul Produk</label>
                <input type="text" name="judul" id="judul" value="{{old('judul')}}"
                       class="form-control @error('judul') is-invalid @enderror">
                @error('judul')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="luas_bangunan">Luas Bangunan (dalam m2)</label>
                <input type="number" name="luas_bangunan" id="luas_bangunan" value="{{old('luas_bangunan')}}"
                       class="form-control @error('luas_bangunan') is-invalid @enderror">
                @error('luas_bangunan')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_kamar_tidur">Jumlah Kamar Tidur</label>
                <input type="number" name="jumlah_kamar_tidur" id="jumlah_kamar_tidur"
                       value="{{old('jumlah_kamar_tidur')}}"
                       class="form-control @error('jumlah_kamar_tidur') is-invalid @enderror">
                @error('jumlah_kamar_tidur')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_kamar_mandi">Jumlah Kamar Mandi</label>
                <input type="number" name="jumlah_kamar_mandi" id="jumlah_kamar_mandi"
                       value="{{old('jumlah_kamar_mandi')}}"
                       class="form-control @error('jumlah_kamar_mandi') is-invalid @enderror">
                @error('jumlah_kamar_mandi')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_toilet_tamu">Jumlah Toilet Tamu</label>
                <input type="number" name="jumlah_toilet_tamu" id="jumlah_toilet_tamu"
                       value="{{old('jumlah_toilet_tamu')}}"
                       class="form-control @error('jumlah_toilet_tamu') is-invalid @enderror">
                @error('jumlah_toilet_tamu')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_maid_room">Jumlah Maid Room</label>
                <input type="number" name="jumlah_maid_room" id="jumlah_maid_room" value="{{old('jumlah_maid_room')}}"
                       class="form-control @error('jumlah_maid_room') is-invalid @enderror">
                @error('jumlah_maid_room')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_mobil_ditampung">Jumlah Mobil yang Dapat Ditampung</label>
                <input type="number" name="jumlah_mobil_ditampung" id="jumlah_mobil_ditampung"
                       value="{{old('jumlah_mobil_ditampung')}}"
                       class="form-control @error('jumlah_mobil_ditampung') is-invalid @enderror">
                @error('jumlah_mobil_ditampung')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="jumlah_lantai">Jumlah Lantai</label>
                <input type="number" name="jumlah_lantai" id="jumlah_lantai" value="{{old('jumlah_lantai')}}"
                       class="form-control @error('jumlah_lantai') is-invalid @enderror">
                @error('jumlah_lantai')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="fee_desain">Fee Desain (dalam Rp)</label>
                <input type="text" id="rupiah" name="fee_desain"
                       class="form-control @error('fee_desain') is-invalid @enderror">
                @error('fee_desain')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script>
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endsection
