@extends('layouts.appmanager')

@section('content')
<div class="container mt-4">

    <h4>Tambah Bahan Baku</h4>

    <form action="{{ route('inventory.bahanbaku.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kode Bahan</label>
            <input type="text"
                name="kodebahan"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Nama Bahan</label>
            <input type="text"
                name="namabahan"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Satuan</label>
            <input type="text"
                name="satuan"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number"
                name="stok"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Harga Beli</label>
            <input type="number"
                name="hargabeli"
                class="form-control"
                required>
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('inventory.bahanbaku.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
@endsection