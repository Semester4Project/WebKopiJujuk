@extends('layout.admin')

@section('title', 'Detail Produk')

@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk:</label>
                        <p>{{ $product->nama_produk }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi:</label>
                        <p>{{ $product->deskripsi }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat:</label>
                        <p>{{ $product->berat }} gram</p>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga:</label>
                        <p>Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori:</label>
                        <p>{{ $product->category ? $product->category->name : 'Tidak ada kategori' }}</p>
                    </div>
                    <a href="{{ route('listproduct') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Produk:</label>
                        @if($product->foto)
                            @php
                                $fotos = json_decode($product->foto);
                            @endphp
                            @if(is_array($fotos) && count($fotos) > 0)
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  @foreach ($fotos as $key => $foto)
                                  <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('images/' . $foto) }}" class="d-block w-100" alt="...">
                                  </div>
                                  @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                              @else
                                <span>No Image</span>
                              @endif
                            @else
                                <span>No Image</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.carousel').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev">Previous</button>',
            nextArrow: '<button type="button" class="slick-next">Next</button>'
        });
    });
</script>
@endpush