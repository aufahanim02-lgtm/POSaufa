@extends('layouts.appmanager')

@section('content')
<div class="container mt-4">

    <h4>Detail Bahan Baku</h4>

    <table class="table table-bordered">
        <tr>
            <th>Nama Bahan</th>
            <td>{{ $bahanbaku->nama_bahan }}</td>
        </tr>

        <tr>
            <th>Satuan</th>
            <td>{{ $bahanbaku->satuan }}</td>
        </tr>

        <tr>
            <th>Stok</th>
            <td>{{ $bahanbaku->stok }}</td>
        </tr>

        <tr>
            <th>Harga</th>
            <td>Rp {{ number_format($bahanbaku->harga) }}</td>
        </tr>
    </table>

    <a href="{{ route('manager.bahanbaku.index') }}" class="btn btn-secondary">Kembali</a>

</div>
@endsection