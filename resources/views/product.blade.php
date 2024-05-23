@extends('layout.admin')

@section('title', 'Product')

@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="mb-3">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <button type="button" class="btn btn-dark mb-1" onclick="tambahProduk()">Tambah Produk</button>
                <button type="button" class="btn btn-dark mb-1" onclick="addKategori()">Tambah Kategori</button>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover dataTable" id="dataTableHover" role="grid" aria-describedby="dataTableHover_info">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Deskripsi</th>
                            <th>Berat</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="{{ route('detailProduct', $product->id_product) }}">
                                    {{ $product->nama_produk }}
                                </a>
                            </td>
                            <td>{{ $product->deskripsi }}</td>
                            <td>{{ $product->berat }}</td>
                            <td>{{ $product->harga }}</td>
                            <td>
                                @if($product->foto)
                                    @php
                                        $fotos = json_decode($product->foto);
                                    @endphp
                                    @if(is_array($fotos) && count($fotos) > 0)
                                        {{-- Menampilkan hanya foto pertama --}}
                                        <img src="{{ asset('images/' . $fotos[0]) }}" alt="Product Image" style="max-width: 100px;">
                                    @endif
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>
                                {{-- {{ route('editProduct', $product->id_product) }} --}}
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('deleteProduct', $product->id_product) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
                                </form>
                            </td>
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