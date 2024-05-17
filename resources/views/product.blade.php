<!-- resources/views/dashboard.blade.php -->
@extends('layout.admin')

@section('title', 'Product')

@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="mb-3"> <!-- Tambahkan div baru -->
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <button type="button" class="btn btn-dark mb-1" onclick="tambahProduk()">Tambah Produk</button>
                <button type="button" class="btn btn-dark mb-1" onclick="addKategori()">Tambah Kategori</button>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover dataTable" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Deskripsi</th>
                            <th>Berat</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->nama_produk }}</td>
                            <td>{{ $product->deskripsi }}</td>
                            <td>{{ $product->berat }}</td>
                            <td>{{ $product->harga }}</td>
                            <td><img src="{{ asset('images/' . $product->foto) }}" alt="Product Image" style="max-width: 100px;"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/ruang-admin.min.js')}}"></script>
<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function () {
        $('#dataTableHover').DataTable();
    });

    function tambahProduk() {
        window.location.href = "{{ route('addproduct') }}";
    }

    function addKategori() {
        window.location.href = "{{ route('addkategori') }}";
    }

</script>
@endsection