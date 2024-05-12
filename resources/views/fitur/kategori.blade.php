<!-- resources/views/dashboard.blade.php -->
@extends('layout.admin')

@section('title', 'kategori')

@section('content')
<!-- Isi konten di sini -->
                      <!-- Form Basic -->
                      <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
                        </div>
                        <div class="card-body">
                          <form>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Kategori</label>
                              <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        </div>
                      </div>
@endsection