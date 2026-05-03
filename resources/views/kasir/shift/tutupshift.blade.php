@extends('layouts.appkasir')

@section('title', 'Tutup Shift')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header bg-danger text-white">
            <h3 class="card-title">
                <i class="fas fa-door-closed"></i> Tutup Shift Kasir
            </h3>
        </div>

        <div class="card-body">

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="alert alert-warning">
                Pastikan semua transaksi sudah selesai sebelum menutup shift.
            </div>

            <form action="{{ route('shift.tutup.proses') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Saldo Akhir</label>
                    <input type="number" name="saldoakhir" class="form-control"
                        placeholder="Masukkan saldo akhir..." required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times"></i> Tutup Shift
                    </button>

                    <a href="{{ route('dashboard.kasir') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection