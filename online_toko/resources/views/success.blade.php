@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="text-center animate__animated animate__fadeInUp">
        <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" 
             alt="Checkout Sukses" 
             class="img-fluid mb-4" 
             style="max-width: 200px;">

        <h1 class="fw-bold mb-3">Checkout Berhasil 🎉</h1>
        <p class="text-muted mb-4">Terima kasih telah berbelanja di <span class="fw-semibold">TokoKita</span>! Pesananmu sedang kami proses.</p>

        <a href="{{ route('home.index') }}" class="btn btn-success rounded-pill px-4 py-2">
            Kembali ke Beranda
        </a>
    </div>

</div>
@endsection
