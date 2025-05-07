@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="mb-4">Riwayat Pesanan</h2>

  @if($orders->count() > 0)
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Waktu</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
            <tr>
              <td>{{ $order->name }}</td>
              <td>{{ $order->phone }}</td>
              <td>{{ $order->address }}</td>
              <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
              <td>{{ ucfirst($order->status) }}</td>
              <td>{{ $order->created_at->format('d M Y H:i') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <p>Belum ada pesanan.</p>
  @endif
</div>
@endsection
