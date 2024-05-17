<!-- resources/views/dashboard/create_product.blade.php -->
@extends('layout.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
    </div>
    <div class="card-body">
      @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk">
            </div>
            <div class="form-group">
                <label for="kategori_id">Pilih Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="foto" name="foto">
                <label class="custom-file-label" for="foto">Pilih Foto</label>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="berat">Berat (dalam gram)</label>
                <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukkan Berat dalam gram">
            </div>
            <div class="form-group">
                <label for="harga">Harga (dalam Rupiah)</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga dalam Rupiah">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection