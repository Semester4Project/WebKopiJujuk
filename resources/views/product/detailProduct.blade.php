<!-- resources/views/dashboard.blade.php -->
@extends('layout.admin')

@section('title', 'pesanan baru')

@section('content')
<h1>Product Detail</h1>
<h2>{{ $product->nama_produk }}</h2>
<p>Price: Rp{{ $product->harga }}</p>
<p>Description: {{ $product->deskripsi }}</p>
<!-- Tambahkan detail lain sesuai kebutuhan -->
@endsection