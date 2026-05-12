<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelBahanBaku;

class ControllerBahanBaku extends Controller
{
    private function viewPath($file)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $role = Auth::user()->role;

        if ($role === 'manager') {
            return "manager.inventory.bahanbaku.$file";
        }

        return "admin.inventory.bahanbaku.$file";
    }

    public function index()
    {
        $data = ModelBahanBaku::orderBy('id', 'desc')->get();

        return view($this->viewPath('index'), compact('data'));
    }

    public function create()
    {
        return view($this->viewPath('create'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodebahan' => 'required|unique:bahanbaku,kodebahan',
            'namabahan' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'hargabeli' => 'required|numeric',
        ]);

        ModelBahanBaku::create($request->all());

        return redirect()->route('inventory.bahanbaku.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = ModelBahanBaku::findOrFail($id);
        return view($this->viewPath('show'), compact('data'));
    }

    public function edit($id)
    {
        $data = ModelBahanBaku::findOrFail($id);
        return view($this->viewPath('edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelBahanBaku::findOrFail($id);

        $request->validate([
            'kodebahan' => 'required|unique:bahanbaku,kodebahan,' . $id,
            'namabahan' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'hargabeli' => 'required|numeric',
        ]);

        $data->update($request->all());

        return redirect()->route('inventory.bahanbaku.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = ModelBahanBaku::findOrFail($id);
        $data->delete();

        return redirect()->route('inventory.bahanbaku.index')
            ->with('success', 'Data berhasil dihapus');
    }
}