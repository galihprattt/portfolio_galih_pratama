<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon; // Tambahkan ini di atas

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set default timezone to Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta'); // ⬅️ Ini wajib agar aplikasi menggunakan zona waktu Jakarta

        // Set Carbon locale to 'id' for Bahasa Indonesia
        \Carbon\Carbon::setLocale('id'); // Ini agar tanggal dan waktu menggunakan format bahasa Indonesia
    }
}
