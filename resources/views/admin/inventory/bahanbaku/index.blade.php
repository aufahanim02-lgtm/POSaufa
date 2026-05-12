@extends('layouts.appadmin')

@section('title', 'Data Bahan Baku')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Data Bahan Baku</h3>
        <a href="{{ route('inventory.bahanbaku.create') }}" class="btn btn-primary btn-sm">
            + Tambah
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->kodebahan }}</td>
                    <td>{{ $row->namabahan }}</td>
                    <td>{{ $row->stok }}</td>
                    <td>{{ $row->satuan }}</td>
                    <td>Rp {{ number_format($row->hargabeli,0,',','.') }}</td>

                    <td>
                        <a href="{{ route('inventory.bahanbaku.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>

                        <a href="{{ route('inventory.bahanbaku.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('inventory.bahanbaku.destroy', $row->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Yakin hapus data?')"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection