<!-- resources/views/dashboard/create_product.blade.php -->
@extends('layout.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="{{ old('nama_produk') }}">
            </div>
            <div class="form-group">
                <label for="id_kategori">Pilih Kategori</label>
                <select class="form-control" id="id_kategori" name="id_kategori">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id_kategori }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>            
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="form-group">
                <label for="berat">Berat (gram)</label>
                <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukkan Berat dalam gram" value="{{ old('berat') }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga (Rupiah)</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga dalam Rupiah" value="{{ old('harga') }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection