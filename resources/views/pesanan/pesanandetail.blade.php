@extends('layout.admin')

@section('title', 'Detail Pesanan')

@section('content')
    <h1>Detail Pesanan</h1>
    <table>
        <tr>
            <th>ID Pesanan</th>
            <td>{{ $pesanan->order_id }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $pesanan->tanggal_pesanan }}</td>
        </tr>
        <tr>
            <th>Total Pembayaran</th>
            <td>{{ $pesanan->total_pembayaran }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $pesanan->status_pesanan }}</td>
        </tr>
        <tr>
            <th>User</th>
            <td>{{ $pesanan->keranjang->user->username }}</td>
        </tr>
        <tr>
            <th>Email User</th>
            <td>{{ $pesanan->keranjang->user->email }}</td>
        </tr>
    </table>

    <h2>Produk dalam Keranjang</h2>
    <table>
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan->keranjang as $item)
                <tr>
                    <td>{{ $item->produk->id_produk }}</td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item->jumlah_barang }}</td>
                    <td>{{ $item->produk->harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('pesanan.updateStatus', $pesanan->order_id) }}" method="POST">
        @csrf
        <label for="status_pesanan">Ubah Status Pesanan:</label>
        <select name="status_pesanan" id="status_pesanan" onchange="this.form.submit()">
            <option value="Pesanan Baru" {{ $pesanan->status_pesanan == 'Pesanan Baru' ? 'selected' : '' }}>Pesanan Baru</option>
            <option value="Pesanan Siap Dikirim" {{ $pesanan->status_pesanan == 'Pesanan Siap Dikirim' ? 'selected' : '' }}>Pesanan Siap Dikirim</option>
            <option value="Pesanan Dikirim" {{ $pesanan->status_pesanan == 'Pesanan Dikirim' ? 'selected' : '' }}>Pesanan Dikirim</option>
            <option value="Pesanan Selesai" {{ $pesanan->status_pesanan == 'Pesanan Selesai' ? 'selected' : '' }}>Pesanan Selesai</option>
        </select>
    </form>
@endsection