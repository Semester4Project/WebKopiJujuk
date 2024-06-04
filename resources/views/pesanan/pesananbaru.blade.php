@extends('layout.admin')

@section('title', 'Pesanan Baru')

@section('content')
    <h1>Pesanan Baru</h1>
    <table>
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Tanggal</th>
                <th>Total Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesananBaru as $pesanan)
                <tr>
                    <td><a href="{{ route('pesanan.show', $pesanan->order_id) }}">{{ $pesanan->order_id }}</a></td>
                    <td>{{ $pesanan->tanggal_pesanan }}</td>
                    <td>{{ $pesanan->total_pembayaran }}</td>
                    <td>{{ $pesanan->status_pesanan }}</td>
                    <td>
                        <form action="{{ route('pesanan.updateStatus', $pesanan->order_id) }}" method="POST">
                            @csrf
                            <select name="status_pesanan" onchange="this.form.submit()">
                                <option value="Pesanan Baru" {{ $pesanan->status_pesanan == 'Pesanan Baru' ? 'selected' : '' }}>Pesanan Baru</option>
                                <option value="Pesanan Siap Dikirim" {{ $pesanan->status_pesanan == 'Pesanan Siap Dikirim' ? 'selected' : '' }}>Pesanan Siap Dikirim</option>
                                <option value="Pesanan Dikirim" {{ $pesanan->status_pesanan == 'Pesanan Dikirim' ? 'selected' : '' }}>Pesanan Dikirim</option>
                                <option value="Pesanan Selesai" {{ $pesanan->status_pesanan == 'Pesanan Selesai' ? 'selected' : '' }}>Pesanan Selesai</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection