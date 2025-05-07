@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold animate__animated animate__fadeInDown">Produk Kami</h1>
        <p class="text-muted animate__animated animate__fadeInUp">Temukan koleksi terbaru kami ✨</p>
    </div>

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInUp">
                    <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                        <div class="position-relative" style="height: 250px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-100 h-100" 
                                 style="object-fit: cover; transition: transform 0.3s ease;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-2">{{ $product->name }}</h5>
                            <p class="text-success fw-semibold mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <span class="btn btn-outline-success btn-sm rounded-pill">Lihat Produk</span>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center rounded-4 shadow-sm">
                    Belum ada produk tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>

<style>
    .card:hover img {
        transform: scale(1.05);
    }
</style>
@endsection
