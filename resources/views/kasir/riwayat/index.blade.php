@extends('layouts.appkasir')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">
                <i class="fas fa-history"></i> Riwayat Transaksi
            </h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode Invoice</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if(isset($data) && count($data) > 0)
                        @foreach($data as $no => $row)
                            <tr>
                                <td class="text-center">{{ $no+1 }}</td>
                                <td>{{ $row->kodeinvoice }}</td>
                                <td>{{ $row->tanggalpenjualan }}</td>
                                <td>Rp {{ number_format($row->total, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    @if($row->status == 'paid')
                                        <span class="badge bg-success">PAID</span>
                                    @else
                                        <span class="badge bg-warning">PENDING</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/kasir/struk/'.$row->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-receipt"></i> Struk
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada riwayat transaksi.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection