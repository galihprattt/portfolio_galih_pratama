@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center py-5" style="min-height: 80vh;">
    <div class="text-center">
        <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-success mx-auto" width="100" height="100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4 -4m5 2a9 9 0 1 1 -18 0a9 9 0 0 1 18 0z" />
            </svg>
        </div>

        <h1 class="text-3xl fw-bold mb-3 text-success">🎉 Terima Kasih!</h1>
        <p class="text-muted mb-4">Pesanan Anda telah berhasil kami terima dan sedang diproses.</p>

        <a href="{{ route('home.index') }}" 
           class="btn btn-success px-5 py-2 shadow rounded-pill">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
