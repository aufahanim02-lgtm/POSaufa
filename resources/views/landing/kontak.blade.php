@extends('layouts.appguest')

@section('title', 'Kontak')

@section('content')

<style>
body {
    background: #f8fafc !important; /* putih kebiruan clean */
}

section {
    background: transparent !important;
}

/* TEXT FIX */
.section-title {
    color: #0f172a !important;
    font-weight: 800;
}

.text-white-50 {
    color: #64748b !important;
}

/* CARD STYLE */
.glass-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    padding: 25px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    color: #0f172a;
}

/* FORM FIX */
.form-label {
    color: #0f172a !important;
    font-weight: 500;
}

.form-control {
    background: #ffffff !important;
    border: 1px solid #e5e7eb !important;
    color: #0f172a !important;
}

.form-control::placeholder {
    color: #94a3b8 !important;
}

/* ICON LINK */
.glass-card a {
    color: #0f172a;
}
</style>

<section class="py-5" style="margin-top:90px;">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Kontak Kami</h2>
            <p class="text-white-50">
                Hubungi kami untuk pertanyaan, kerja sama, atau informasi lebih lanjut.
            </p>
        </div>

        <div class="row g-4">

            <!-- FORM -->
            <div class="col-lg-7" data-aos="fade-right">
                <div class="glass-card">

                    <h4 class="fw-bold text-warning mb-4">
                        <i class="fa-solid fa-envelope"></i> Kirim Pesan
                    </h4>

                    <form action="#" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control"
                                   placeholder="Masukkan nama anda" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   placeholder="Masukkan email anda" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subjek</label>
                            <input type="text" name="subjek" class="form-control"
                                   placeholder="Masukkan subjek" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea name="pesan" rows="5" class="form-control"
                                      placeholder="Tulis pesan anda..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                            <i class="fa-solid fa-paper-plane"></i> Kirim Pesan
                        </button>

                    </form>

                </div>
            </div>

            <!-- INFO -->
            <div class="col-lg-5" data-aos="fade-left">

                <div class="glass-card">
                    <h4 class="fw-bold text-warning mb-4">
                        <i class="fa-solid fa-location-dot"></i> Informasi Kontak
                    </h4>

                    <p><i class="fa-solid fa-map"></i> Indonesia</p>
                    <p><i class="fa-solid fa-phone"></i> +62 83878969362</p>
                    <p><i class="fa-solid fa-envelope"></i> cafepos@gmail.com</p>

                    <hr>

                    <h5 class="fw-bold">Jam Operasional</h5>
                    <p>Senin - Minggu</p>
                    <p>08:00 - 23:00</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="fs-4"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="fs-4"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="fs-4"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="fs-4"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="glass-card mt-4 text-center">
                    <h5 class="fw-bold">Butuh Demo Aplikasi?</h5>
                    <p class="text-white-50">
                        Silakan login sebagai kasir untuk melihat dashboard.
                    </p>
                    <a href="{{ url('/login') }}" class="btn btn-primary w-100 rounded-pill">
                        Login Sekarang
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection