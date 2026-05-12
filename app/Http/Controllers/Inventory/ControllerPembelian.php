<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelPembelian;
use App\Models\ModelDetailPembelian;
use App\Models\ModelSupplier;
use App\Models\ModelBahanBaku;

class ControllerPembelian extends Controller
{
    private function viewPath($file)
    {
        $role = Auth::user()->role;

        if ($role == 'manager') {
            return "manager.inventory.pembelian.$file";
        }

        return "admin.inventory.pembelian.$file";
    }

    public function index()
    {
        $data = ModelPembelian::latest()->get();

        return view($this->viewPath('index'), compact('data'));
    }

    public function create()
    {
        $supplier = ModelSupplier::all();
        $bahanbaku = ModelBahanBaku::all();

        return view($this->viewPath('create'), compact('supplier', 'bahanbaku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplierid' => 'required',
            'tanggalpembelian' => 'required',
            'total' => 'required|numeric',

            'bahanbakuid' => 'required|array',
            'qty' => 'required|array',
            'harga' => 'required|array',
            'subtotal' => 'required|array',
        ]);

        // 🔥 SIMPAN HEADER
        $pembelian = ModelPembelian::create([
            'supplierid' => $request->supplierid,
            'userid' => Auth::id(),
            'tanggalpembelian' => $request->tanggalpembelian,
            'total' => $request->total,
        ]);

        // 🔥 SIMPAN DETAIL
        foreach ($request->bahanbakuid as $i => $bahanid) {
            ModelDetailPembelian::create([
                'pembelianid' => $pembelian->id,
                'bahanbakuid' => $bahanid,
                'qty' => $request->qty[$i],
                'harga' => $request->harga[$i],
                'subtotal' => $request->subtotal[$i],
            ]);
        }

        return redirect()
            ->route('inventory.pembelian.index')
            ->with('success', 'Pembelian berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pembelian = ModelPembelian::findOrFail($id);

        $detail = ModelDetailPembelian::where('pembelianid', $id)->get();

        return view($this->viewPath('show'), compact('pembelian', 'detail'));
    }

    public function edit($id)
    {
        $pembelian = ModelPembelian::findOrFail($id);
        $supplier = ModelSupplier::all();

        return view($this->viewPath('edit'), compact('pembelian', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplierid' => 'required',
            'tanggalpembelian' => 'required',
            'total' => 'required|numeric',
        ]);

        $pembelian = ModelPembelian::findOrFail($id);

        $pembelian->update([
            'supplierid' => $request->supplierid,
            'tanggalpembelian' => $request->tanggalpembelian,
            'total' => $request->total,
        ]);

        return redirect()
            ->route('inventory.pembelian.index')
            ->with('success', 'Pembelian berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pembelian = ModelPembelian::findOrFail($id);

        // optional: hapus detail juga
        ModelDetailPembelian::where('pembelianid', $id)->delete();

        $pembelian->delete();

        return redirect()
            ->route('inventory.pembelian.index')
            ->with('success', 'Pembelian berhasil dihapus.');
    }
}