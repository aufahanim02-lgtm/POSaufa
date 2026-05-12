@extends('layouts.appadmin')

@section('title', 'Tambah Pembelian')

@section('content')
<div class="container-fluid mt-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Tambah Pembelian</h4>

        <a href="{{ route('inventory.pembelian.index') }}" class="btn btn-secondary btn-sm">
            Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inventory.pembelian.store') }}" method="POST">
        @csrf

        {{-- HEADER --}}
        <div class="card mb-3">
            <div class="card-header">
                Data Pembelian
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Supplier</label>
                        <select name="supplierid" class="form-control" required>
                            <option value="">-- Pilih Supplier --</option>
                            @foreach($supplier as $s)
                                <option value="{{ $s->id }}">{{ $s->namasupplier }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Tanggal Pembelian</label>
                        <input type="date" name="tanggalpembelian" class="form-control" required>
                    </div>

                </div>

            </div>
        </div>

        {{-- DETAIL --}}
        <div class="card mb-3">

            <div class="card-header d-flex justify-content-between">
                <b>Detail Pembelian</b>

                <button type="button" class="btn btn-success btn-sm" onclick="tambahBaris()">
                    + Tambah
                </button>
            </div>

            <div class="card-body table-responsive">

                <table class="table table-bordered" id="tableDetail">

                    <thead>
                        <tr>
                            <th>Bahan Baku</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <select name="bahanbakuid[]" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach($bahanbaku as $b)
                                        <option value="{{ $b->id }}">{{ $b->namabahan }}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <input type="number" name="qty[]" class="form-control qty" required>
                            </td>

                            <td>
                                <input type="number" name="harga[]" class="form-control harga" required>
                            </td>

                            <td>
                                <input type="number" name="subtotal[]" class="form-control subtotal" readonly>
                            </td>

                            <td>
                                <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>

        </div>

        {{-- TOTAL --}}
        <div class="card mb-3">
            <div class="card-body">

                <div class="row justify-content-end">
                    <div class="col-md-4">
                        <label>Total</label>
                        <input type="number" name="total" id="total" class="form-control" readonly>
                    </div>
                </div>

            </div>
        </div>

        <button class="btn btn-primary">
            Simpan Pembelian
        </button>

    </form>

</div>

{{-- SCRIPT --}}
<script>

function hitung() {
    let total = 0;

    document.querySelectorAll("#tableDetail tbody tr").forEach(row => {

        let qty = row.querySelector(".qty").value || 0;
        let harga = row.querySelector(".harga").value || 0;

        let subtotal = qty * harga;

        row.querySelector(".subtotal").value = subtotal;

        total += subtotal;
    });

    document.getElementById("total").value = total;
}

document.addEventListener("input", function(e) {
    if (e.target.classList.contains("qty") || e.target.classList.contains("harga")) {
        hitung();
    }
});

function tambahBaris() {

    let table = document.querySelector("#tableDetail tbody");

    let row = document.createElement("tr");

    row.innerHTML = `
        <td>
            <select name="bahanbakuid[]" class="form-control" required>
                <option value="">-- Pilih --</option>
                @foreach($bahanbaku as $b)
                    <option value="{{ $b->id }}">{{ $b->namabahan }}</option>
                @endforeach
            </select>
        </td>

        <td><input type="number" name="qty[]" class="form-control qty" required></td>

        <td><input type="number" name="harga[]" class="form-control harga" required></td>

        <td><input type="number" name="subtotal[]" class="form-control subtotal" readonly></td>

        <td>
            <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">
                Hapus
            </button>
        </td>
    `;

    table.appendChild(row);
}

function hapusBaris(btn) {
    btn.closest("tr").remove();
    hitung();
}

</script>

@endsection