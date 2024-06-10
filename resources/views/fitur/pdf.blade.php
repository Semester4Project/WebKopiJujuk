<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Penjualan</h1>
    <p>Tanggal: {{ $tanggalAwal }} - {{ $tanggalAkhir }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal Penjualan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->product_name }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ $sale->price }}</td>
                <td>{{ $sale->tanggal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
