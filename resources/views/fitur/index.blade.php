@extends('layout.admin')

@section('content')
<h1>Laporan Pendapatan {{ tanggal_indonesia($tanggalAwal, false) }} s/d {{ tanggal_indonesia($tanggalAkhir, false) }}</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <form method="GET" action="{{ route('laporan.index') }}">
                    <div class="form-group">
                        <label for="tanggalAwal">Tanggal Awal:</label>
                        <input type="date" name="tanggalAwal" class="form-control" value="{{ $tanggalAwal }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggalAkhir">Tanggal Akhir:</label>
                        <input type="date" name="tanggalAkhir" class="form-control" value="{{ $tanggalAkhir }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ url('laporan/export-pdf') }}?start_date={{ $tanggalAwal }}&end_date={{ $tanggalAkhir }}" class="btn btn-danger mb-2">Export PDF</a>
                </form>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Produk</th>
                            <th>Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporan as $key => $laporan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $laporan->tanggal }}</td>
                                <td>{{ $laporan->produk }}</td>
                                <td>{{ number_format($laporan->pendapatan, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
