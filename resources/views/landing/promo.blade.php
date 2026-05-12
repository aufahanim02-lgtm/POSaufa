@extends('layouts.appguest')

@section('title', 'Promo')

@section('content')

<style>
body {
    background: #f8fafc;
}

/* SECTION */
.promo-section {
    padding: 90px 0;
    background: #f8fafc;
}

/* TITLE */
.section-title {
    font-weight: 800;
    color: #0f172a;
}

/* TEXT MUTED */
.text-muted-custom {
    color: #64748b !important;
}

/* CARD */
.glass-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    padding: 25px;
    transition: 0.3s;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    height: 100%;
}

.glass-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(59,130,246,0.15);
}

/* BUTTON */
.btn-gradient {
    background: linear-gradient(45deg, #3b82f6, #6366f1);
    border: none;
    color: #fff;
}

.btn-gradient:hover {
    opacity: 0.9;
    color: #fff;
}
</style>

<section class="promo-section">
    <div class="container">

        <!-- TITLE -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Promo Spesial</h2>
            <p class="text-muted-custom">
                Nikmati promo menarik setiap hari untuk pelanggan CAFEPOS.
            </p>
        </div>

        <!-- LIST PROMO -->
        <div class="row g-4">

            @forelse($promo as $row)

                @if($row->status == 1 || $row->status == 'aktif')
                <div class="col-md-4" data-aos="zoom-in">

                    <div class="glass-card">

                        <!-- TITLE -->
                        <h4 class="fw-bold text-primary">
                            <i class="fa-solid fa-tags"></i>
                            {{ $row->namapromo }}
                        </h4>

                        <!-- TYPE -->
                        <p class="text-muted-custom mb-2">
                            Jenis: <b>{{ $row->jenis }}</b>
                        </p>

                        <!-- DISKON -->
                        <h5 class="fw-bold text-warning">
                            Diskon {{ $row->nilaidiskon }}%
                        </h5>

                        <!-- MIN BELANJA -->
                        <p class="text-muted-custom mb-1">
                            Minimal Belanja: Rp {{ number_format($row->minimalbelanja, 0, ',', '.') }}
                        </p>

                        <!-- PERIODE -->
                        <p class="text-muted-custom mb-3">
                            Periode:<br>
                            {{ $row->tanggalmulai }} s/d {{ $row->tanggalselesai }}
                        </p>

                        <!-- BUTTON -->
                        <a href="{{ url('/menu') }}"
                           class="btn btn-gradient rounded-pill w-100">
                            Ambil Promo
                        </a>

                    </div>

                </div>
                @endif

            @empty
                <div class="col-12 text-center">
                    <div class="glass-card">
                        <h5 class="fw-bold">Belum ada promo tersedia</h5>
                        <p class="text-muted-custom mb-0">
                            Silakan cek kembali nanti.
                        </p>
                    </div>
                </div>
            @endforelse

        </div>

        <!-- FOOTER -->
        <div class="text-center mt-5" data-aos="fade-up">
            <h5 class="fw-bold">Promo Bisa Berubah Kapan Saja</h5>
            <p class="text-muted-custom">
                Sesuai kebijakan manajemen CAFEPOS.
            </p>
        </div>

    </div>
</section>

@endsection