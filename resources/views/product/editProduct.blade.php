@extends('layout.admin')

@section('title', 'Update Produk')

@section('content')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Update Produk</h6>
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
        <form action="{{ route('products.update', ['id' => $product->id_product]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="{{ old('nama_produk', $product->nama_produk) }}">
            </div>
            <div class="form-group">
                <label for="id_kategori">Pilih Kategori</label>
                <select class="form-control" id="id_kategori" name="id_kategori">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id_kategori }}" {{ $category->id_kategori == $product->id_kategori ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>            
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto[]" multiple>
                @if ($product->foto)
                <div class="mt-2">
                    @foreach (json_decode($product->foto) as $foto)
                        <img src="{{ asset('storage/images/' . $foto) }}" alt="Foto Produk" style="max-width: 100px; margin-right: 10px;">
                    @endforeach
                </div>
            @endif
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $product->deskripsi) }}</textarea>
            </div>
            <div class="form-group">
                <label for="berat">Berat (gram)</label>
                <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukkan Berat dalam gram" value="{{ old('berat', $product->berat) }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga (Rupiah)</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga dalam Rupiah" value="{{ old('harga', $product->harga) }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('listproduct') }}" class="btn btn-secondary">Kembali</a>
            <button type="reset" class="btn btn-dark">Reset</button>
        </form>
    </div>
</div>
@endsection