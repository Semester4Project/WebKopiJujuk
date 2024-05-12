<!-- resources/views/dashboard.blade.php -->
@extends('layout.admin')

@section('title', 'Tambah Produk')

@section('content')
<!-- Isi konten di sini -->
                      <!-- Form Basic -->
                      <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
                        </div>
                        <div class="card-body">
                          <form>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Produk</label>
                              <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Produk">
                            </div>
                            <select class="form-control mb-3">
                                <option>Pilih Kategori</option>
                                <option>Arabica</option>
                                <option>Robusta</option>
                                <option>Mix</option>
                              </select>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Pilih Foto</label>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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