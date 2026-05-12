@extends('layouts.appguest')

@section('title', 'Login')

@section('content')

<style>
body {
    background: #f8fafc !important; /* putih kebiruan clean */
}

section {
    background: transparent !important;
}

/* CARD LOGIN */
.glass-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    padding: 30px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

/* TEXT */
.text-white-50 {
    color: #64748b !important;
}

.form-label {
    color: #0f172a !important;
    font-weight: 500;
}

/* INPUT FIX */
.form-control {
    background: #ffffff !important;
    border: 1px solid #e5e7eb !important;
    color: #0f172a !important;
}

.form-control::placeholder {
    color: #94a3b8 !important;
}

/* BUTTON OUTLINE FIX */
.btn-outline-light {
    color: #0f172a !important;
    border: 1px solid #e5e7eb !important;
}

.btn-outline-light:hover {
    background: #f1f5f9 !important;
}

/* LINK */
a.text-warning {
    color: #f59e0b !important;
}
</style>

<section class="py-5" style="margin-top:90px;">
    <div class="container">

        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 col-md-7" data-aos="zoom-in">

                <div class="glass-card">

                    <!-- HEADER -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-warning">
                            <i class="fa-solid fa-mug-hot"></i> CAFEPOS
                        </h2>
                        <p class="text-white-50 mb-0">
                            Silakan login untuk masuk ke sistem kasir
                        </p>
                    </div>

                    <!-- ERROR -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- SUCCESS -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('auth.loginproses') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username"
                                class="form-control"
                                placeholder="Masukkan username" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password"
                                    class="form-control"
                                    placeholder="Masukkan password" required>

                                <button type="button" class="btn btn-outline-light" onclick="togglePassword()">
                                    <i class="fa-solid fa-eye" id="iconEye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label text-dark" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <a href="#" class="text-warning text-decoration-none">
                                Lupa password?
                            </a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </button>

                        <div class="text-center mt-4">
                            <p class="text-dark mb-0">
                                Kembali ke halaman
                                <a href="{{ url('/') }}" class="text-warning text-decoration-none fw-bold">
                                    Landing Page
                                </a>
                            </p>
                        </div>

                    </form>

                    <hr class="border-secondary mt-4">

                    <div class="text-center">
                        <small class="text-dark">
                            Login sesuai role: <b>Owner</b>, <b>Manager</b>, <b>Kasir</b>
                        </small>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

@push('scripts')
<script>
function togglePassword() {
    let password = document.getElementById("password");
    let iconEye = document.getElementById("iconEye");

    if (password.type === "password") {
        password.type = "text";
        iconEye.classList.remove("fa-eye");
        iconEye.classList.add("fa-eye-slash");
    } else {
        password.type = "password";
        iconEye.classList.remove("fa-eye-slash");
        iconEye.classList.add("fa-eye");
    }
}
</script>
@endpush

@endsection