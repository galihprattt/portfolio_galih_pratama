@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="fw-bold text-center mb-5 animate__animated animate__fadeInDown">Checkout 🛍️</h1>

    @if (session('error'))
        <div class="alert alert-danger text-center rounded-4 shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control rounded-4" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email" class="form-control rounded-4" required>
                    </div>

                    <div class="mb-4">
                        <label for="address" class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea name="address" id="address" class="form-control rounded-4" rows="4" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label fw-semibold">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="phone" id="phone" class="form-control rounded-4" required>
                    </div>

                    @isset($total)
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Total Belanja</label>
                        <div class="form-control rounded-4 bg-light">
                            {{ number_format($total, 0, ',', '.') }}
                        </div>
                    </div>

                    <input type="hidden" name="total" value="{{ $total }}">
                    @endisset

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success rounded-pill py-2">
                            Proses Checkout
                        </button>
                    </div>

                    <div class="mt-3 text-center">
                        <a href="{{ route('cart.index') }}" class="text-decoration-none text-secondary">
                            ← Kembali ke Keranjang
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection
