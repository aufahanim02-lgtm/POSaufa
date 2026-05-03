<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelPembelian;

class ControllerPembelian extends Controller
{
    public function index()
    {
        $data = ModelPembelian::with(['supplier','user'])->orderBy('id', 'desc')->get();
        return view('admin.inventory.pembelian.index', compact('data'));
    }

    public function create()
    {
        return view('admin.inventory.pembelian.create');
    }

    public function edit($id)
    {
        $data = ModelPembelian::findOrFail($id);
        return view('admin.inventory.pembelian.edit', compact('data'));
    }

    public function show($id)
    {
        $data = ModelPembelian::with(['supplier','user'])->findOrFail($id);
        return view('admin.inventory.pembelian.show', compact('data'));
    }
}