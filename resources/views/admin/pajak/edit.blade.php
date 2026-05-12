@extends('layouts.appadmin')

@section('title', 'Edit Pajak')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h4>Edit Pajak</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('master.pajak.update', $data->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- NAMA PAJAK --}}
                <div class="mb-3">
                    <label>Nama Pajak</label>
                    <input type="text"
                           name="namapajak"
                           value="{{ $data->namapajak }}"
                           class="form-control"
                           required>
                </div>

                {{-- PERSEN --}}
                <div class="mb-3">
                    <label>Persen (%)</label>
                    <input type="number"
                           name="persen"
                           value="{{ $data->persen }}"
                           class="form-control"
                           required>
                </div>

                {{-- STATUS --}}
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="aktif" {{ $data->status == 'aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="nonaktif" {{ $data->status == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>
                    </select>
                </div>

                <button class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('master.pajak.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection