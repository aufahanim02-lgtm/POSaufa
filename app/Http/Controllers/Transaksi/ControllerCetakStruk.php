<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelPenjualan;
use App\Models\ModelCetakStruk;

class ControllerCetakStruk extends Controller
{
    public function index($id)
    {
        $penjualan = ModelPenjualan::findOrFail($id);

        return view('kasir.pos.struk', compact('penjualan'));
    }
}