@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="fw-bold text-center mb-5 animate__animated animate__fadeInDown">Keranjang Belanja 🛒</h1>

    @if (session('success'))
        <div class="alert alert-success text-center rounded-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if (count($cart) > 0)
        <div class="table-responsive animate__animated animate__fadeInUp">
            <table class="table align-middle text-center">
                <thead class="table-success">
                    <tr>
                        <th>Produk</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr class="align-middle">
                            <td style="width: 120px;">
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid rounded" style="height: 80px; object-fit: cover;">
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $id) }}" method="POST" onsubmit="return confirm('Hapus produk ini dari keranjang?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm rounded-pill">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 animate__animated animate__fadeInUp">
            <a href="{{ route('home.index') }}" class="btn btn-outline-secondary rounded-pill">
                ← Lanjut Belanja
            </a>

            <div class="d-flex gap-2">
                <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Kosongkan seluruh keranjang?')">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger rounded-pill">Kosongkan Keranjang</button>
                </form>

                <a href="{{ route('checkout.index') }}" class="btn btn-success rounded-pill">
                    Lanjutkan ke Checkout →
                </a>
            </div>
        </div>

    @else
        <div class="text-center animate__animated animate__fadeInUp">
            <img src="https://cdn-icons-png.flaticon.com/512/102/102661.png" alt="Empty Cart" class="img-fluid mb-4" style="max-width: 200px;">
            <h4 class="fw-bold mb-3">Keranjangmu Kosong 😢</h4>
            <a href="{{ route('home.index') }}" class="btn btn-success rounded-pill">
                Belanja Sekarang
            </a>
        </div>
    @endif

</div>
@endsection
