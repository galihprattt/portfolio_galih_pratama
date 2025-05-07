@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="card shadow rounded-4 border-0 overflow-hidden">
                <div class="row g-0">

                    <div class="col-md-6 bg-light d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="img-fluid rounded-3" 
                             style="max-height: 400px; object-fit: contain;">
                    </div>

                    <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
                        <h1 class="fw-bold mb-3" style="font-size: 2rem;">{{ $product->name }}</h1>

                        <h2 class="text-danger fw-bold mb-4" style="font-size: 2rem;">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </h2>

                        <p class="text-muted mb-4" style="font-size: 1rem;">
                            {{ $product->description }}
                        </p>

                        <form action="{{ route('cart.store', $product->id) }}" method="POST" class="d-grid gap-2">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg rounded-pill shadow">
                                + Tambah ke Keranjang
                            </button>
                        </form>

                        <a href="{{ route('home.index') }}" 
                           class="btn btn-link mt-3 text-decoration-none text-muted">
                            ← Kembali ke Beranda
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
