@extends('layouts.appmanager')

@section('content')
<div class="container mt-4">

    <h4>Data Bahan Baku</h4>

    <a href="{{ route('inventory.bahanbaku.create') }}"
        class="btn btn-primary mb-3">
        + Tambah Bahan Baku
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Bahan</th>
                <th>Nama Bahan</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($bahanbaku as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->kodebahan }}</td>
                <td>{{ $item->namabahan }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    Rp {{ number_format($item->hargabeli, 0, ',', '.') }}
                </td>

                <td>

                    <a href="{{ route('inventory.bahanbaku.show', $item->id) }}"
                        class="btn btn-info btn-sm">
                        Detail
                    </a>

                    <a href="{{ route('inventory.bahanbaku.edit', $item->id) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('inventory.bahanbaku.destroy', $item->id) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin hapus data?')">
                            Hapus
                        </button>

                    </form>

                </td>
            </tr>

            @empty
            <tr>
                <td colspan="7" class="text-center">
                    Data bahan baku kosong
                </td>
            </tr>
            @endforelse

        </tbody>
    </table>

</div>
@endsection