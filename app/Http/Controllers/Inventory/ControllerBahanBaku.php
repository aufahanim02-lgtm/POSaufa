<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelBahanBaku;

class ControllerBahanBaku extends Controller
{
    public function index()
    {
        $data = ModelBahanBaku::orderBy('id', 'desc')->get();
        return view('admin.inventory.bahanbaku.index', compact('data'));
    }

    public function create()
    {
        return view('admin.inventory.bahanbaku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodebahan' => 'required|unique:bahanbaku,kodebahan',
            'namabahan' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'nullable',
            'hargabeli' => 'required|numeric'
        ]);

        ModelBahanBaku::create($request->all());

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan baku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = ModelBahanBaku::findOrFail($id);
        return view('admin.inventory.bahanbaku.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelBahanBaku::findOrFail($id);

        $request->validate([
            'kodebahan' => 'required|unique:bahanbaku,kodebahan,' . $data->id,
            'namabahan' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'nullable',
            'hargabeli' => 'required|numeric'
        ]);

        $data->update($request->all());

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan baku berhasil diupdate!');
    }

    public function show($id)
    {
        $data = ModelBahanBaku::findOrFail($id);
        return view('admin.inventory.bahanbaku.show', compact('data'));
    }

    public function delete($id)
    {
        $data = ModelBahanBaku::findOrFail($id);
        $data->delete();

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan baku berhasil dihapus!');
    }
}