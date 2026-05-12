@extends('layouts.appguest')

@section('title', 'Menu')

@section('content')

<style>
body {
    background: #f8fafc !important;
}

section {
    background: transparent !important;
}

/* FIX TEXT COLOR UNTUK BACKGROUND PUTIH */
.section-title {
    color: #0f172a !important;
    font-weight: 700;
}

.text-white-50 {
    color: #64748b !important; /* abu modern */
}

/* CARD TEXT */
.glass-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    padding: 20px;
    color: #0f172a;
}

/* INPUT SEARCH FIX */
.form-control {
    background: #ffffff !important;
    color: #0f172a !important;
    border: 1px solid #e5e7eb !important;
}

.form-control::placeholder {
    color: #94a3b8 !important;
}
</style>

<section class="py-5" style="margin-top:90px;">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Menu CAFEPOS</h2>
            <p class="text-white-50">
                Pilihan menu terbaik dengan harga terjangkau dan rasa berkualitas.
            </p>
        </div>

        <!-- Search Menu -->
        <div class="row justify-content-center mb-4" data-aos="fade-up">
            <div class="col-md-8">
                <div class="glass-card">
                    <form action="{{ route('landing.menu') }}" method="GET">
                        <div class="input-group">

                            <input type="text"
                                name="q"
                                value="{{ request('q') }}"
                                class="form-control"
                                placeholder="Cari menu... (contoh: kopi, nasi goreng, teh)">

                            <button class="btn btn-primary px-4" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i> Cari
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Menu List -->
        <div class="row g-4">

            @forelse($produk as $row)
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="glass-card">

                        @if($row->foto)
                            <img src="{{ asset('storage/' . $row->foto) }}"
                                class="img-fluid rounded-4 mb-3"
                                style="width:100%; height:220px; object-fit:cover;"
                                alt="{{ $row->namaproduk }}">
                        @else
                            <img src="{{ asset('dist/img/user2-160x160.jpg') }}"
                                class="img-fluid rounded-4 mb-3"
                                style="width:100%; height:220px; object-fit:cover;"
                                alt="Default Menu">
                        @endif

                        <h5 class="fw-bold" style="color:#0f172a;">
                            {{ $row->namaproduk }}
                        </h5>

                        <p style="color:#64748b;">
                            Kode: {{ $row->kodeproduk }} <br>
                            Satuan: {{ $row->satuan }}
                        </p>

                        <h6 class="fw-bold text-primary">
                            Rp {{ number_format($row->hargajual, 0, ',', '.') }}
                        </h6>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="glass-card">
                        <h5 class="fw-bold" style="color:#0f172a;">
                            Menu belum tersedia
                        </h5>
                        <p style="color:#64748b;">
                            Silakan tambahkan pro
                            duk di dashboard admin.
                        </p>
                    </div>
                </div>
            @endforelse

        </div>

    </div>
</section>

@endsection