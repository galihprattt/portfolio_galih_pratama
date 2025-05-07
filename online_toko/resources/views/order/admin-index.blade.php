@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Pesanan Pelanggan 📦</h1>
        <div>
            <a href="{{ url('/admin/products') }}" class="btn btn-primary me-2">
                📦 Lihat Produk
            </a>
            <a href="{{ url('/admin/products/create') }}" class="btn btn-success">
                + Tambah Produk
            </a>
        </div>
    </div>

    @if ($orders->isEmpty())
        <p>Tidak ada pesanan masuk.</p>
    @else
        <div class="overflow-x-auto">
            <table class="table-auto w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Alamat</th>
                        <th class="px-4 py-2">No HP</th>
                        <th class="px-4 py-2">Produk</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $order->name }}</td>
                            <td class="px-4 py-2">{{ $order->email }}</td>
                            <td class="px-4 py-2">{{ $order->address }}</td>
                            <td class="px-4 py-2">{{ $order->phone }}</td>
                            <td class="px-4 py-2">
                                <ul class="list-disc list-inside text-sm">
                                    @php
                                        $items = json_decode($order->items, true);
                                    @endphp

                                    @if (is_array($items))
                                        @foreach ($items as $item)
                                            <li>{{ $item['name'] }} x {{ $item['quantity'] }}</li>
                                        @endforeach
                                    @else
                                        <li><em>Data tidak tersedia</em></li>
                                    @endif
                                </ul>
                            </td>
                            <td class="px-4 py-2">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $order->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
