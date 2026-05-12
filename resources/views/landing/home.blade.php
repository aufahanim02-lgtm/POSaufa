@extends('layouts.appguest')

@section('title', 'Home')

@section('content')

<style>
/* =========================
   GLOBAL BACKGROUND (WHITE BLUE CLEAN)
========================= */



/* =========================
   HERO SECTION
========================= */

.hero-section {
    background: linear-gradient(135deg, #ffffff 0%, #eaf2ff 100%);
    padding: 90px 0;
    position: relative;
    overflow: hidden;
}

/* soft blue glow */
.hero-section::before {
    content: "";
    position: absolute;
    width: 320px;
    height: 320px;
    background: rgba(59, 130, 246, 0.15);
    filter: blur(100px);
    border-radius: 50%;
    top: -80px;
    left: -80px;
}

.hero-section::after {
    content: "";
    position: absolute;
    width: 380px;
    height: 380px;
    background: rgba(99, 102, 241, 0.12);
    filter: blur(120px);
    border-radius: 50%;
    bottom: -120px;
    right: -120px;
}

/* TEXT */
.hero-title {
    font-size: 42px;
    font-weight: 800;
    color: #0f172a;
}

.hero-subtitle {
    color: #64748b;
    font-size: 16px;
}

/* =========================
   BUTTON
========================= */

.btn-gradient {
    background: linear-gradient(45deg, #3b82f6, #6366f1);
    border: none;
    color: #fff;
    transition: 0.3s;
}

.btn-gradient:hover {
    transform: translateY(-2px);
    opacity: 0.95;
    color: #fff;
}

.btn-outline-light {
    border: 1px solid #cbd5e1;
    color: #334155;
    background: #fff;
}

.btn-outline-light:hover {
    background: #f1f5ff;
}

/* =========================
   SECTION
========================= */

section {
    padding: 70px 0;
}

/* =========================
   GLASS CARD (LIGHT VERSION)
========================= */

.glass-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    padding: 28px;
    transition: 0.3s ease;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    height: 100%;
}

.glass-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(59,130,246,0.15);
}

/* =========================
   SECTION TITLE
========================= */

.section-title {
    font-weight: 800;
    color: #0f172a;
}

/* muted text */
.text-white-50 {
    color: #64748b !important;
}

/* image styling */
img {
    border-radius: 16px;
}
</style>

<!-- ================= HERO ================= -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="hero-title">
                    Aplikasi Kasir Cafe Modern <span class="text-primary">CAFEPOS</span>
                </h1>

                <p class="hero-subtitle mt-3">
                    Kelola transaksi, stok bahan baku, laporan penjualan, dan shift kasir
                    dengan cepat dan profesional.
                </p>

                <div class="d-flex gap-3 mt-4 flex-wrap">
                    <a href="{{ url('/menu') }}" class="btn btn-gradient px-4 py-2 rounded-pill">
                        <i class="fa-solid fa-utensils"></i> Lihat Menu
                    </a>

                    <a href="{{ url('/login') }}" class="btn btn-outline-light px-4 py-2 rounded-pill">
                        <i class="fa-solid fa-user"></i> Login Kasir
                    </a>
                </div>

                <div class="mt-5 d-flex gap-4 flex-wrap">
                    <div>
                        <h5 class="fw-bold text-primary">Fast</h5>
                        <p class="text-white-50 mb-0">Transaksi cepat</p>
                    </div>

                    <div>
                        <h5 class="fw-bold text-primary">Secure</h5>
                        <p class="text-white-50 mb-0">Role aman</p>
                    </div>

                    <div>
                        <h5 class="fw-bold text-primary">Report</h5>
                        <p class="text-white-50 mb-0">Laporan otomatis</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center" data-aos="fade-left">
                <img src="{{ asset('foto/banner/cafe.jpeg') }}"
                     class="img-fluid shadow"
                     alt="CAFEPOS Hero">
            </div>

        </div>
    </div>
</section>

<!-- ================= FITUR ================= -->
<section>
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Fitur Unggulan CAFEPOS</h2>
            <p class="text-white-50">
                Sistem kasir modern untuk cafe & restoran.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4" data-aos="zoom-in">
                <div class="glass-card text-center">
                    <i class="fa-solid fa-cash-register fs-1 text-primary"></i>
                    <h5 class="fw-bold mt-3">POS Cepat</h5>
                    <p class="text-white-50">
                        Transaksi cepat & mudah digunakan.
                    </p>
                </div>
            </div>

            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="glass-card text-center">
                    <i class="fa-solid fa-boxes-stacked fs-1 text-primary"></i>
                    <h5 class="fw-bold mt-3">Inventory</h5>
                    <p class="text-white-50">
                        Kelola stok bahan baku lebih rapi.
                    </p>
                </div>
            </div>

            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="glass-card text-center">
                    <i class="fa-solid fa-chart-line fs-1 text-primary"></i>
                    <h5 class="fw-bold mt-3">Laporan</h5>
                    <p class="text-white-50">
                        Laporan otomatis harian & bulanan.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= INFO ================= -->
<section>
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('foto/banner/mockup.png') }}"
                     class="img-fluid shadow"
                     alt="CAFEPOS Mockup">
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="section-title">Cocok Untuk Cafe & Restoran</h2>

                <p class="text-white-50 mt-3">
                    CAFEPOS membantu bisnis kamu lebih modern dan efisien.
                </p>

                <ul class="text-white-50 mt-4">
                    <li class="mb-2">✔ Multi Role System</li>
                    <li class="mb-2">✔ Shift Kasir</li>
                    <li class="mb-2">✔ Barcode Produk</li>
                    <li class="mb-2">✔ Cetak Struk Otomatis</li>
                </ul>

                <a href="{{ url('/kontak') }}"
                   class="btn btn-gradient px-4 py-2 rounded-pill mt-4">
                    <i class="fa-solid fa-headset"></i> Hubungi Kami
                </a>
            </div>

        </div>
    </div>
</section>

@endsection