<!-- resources/views/dashboard.blade.php -->
@extends('layout.admin')

@section('title', 'Pesanan Selesai')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
      <!-- Simple Tables -->
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Pesanan Selesai</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
                  <tr>
                      <td>{{ $order->order_id }}</td>
                      <td>{{ $order->customer }}</td>
                      <td>{{ $order->harga }}</td>
                      <td>{{ $order->status_pesanan }}</td>
                      <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
  <!--Row-->
@endsection
