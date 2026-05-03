<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelStokMasuk;

class ControllerStokMasuk extends Controller
{
    public function index()
    {
        $data = ModelStokMasuk::with('bahanbaku')->orderBy('id', 'desc')->get();
        return view('admin.inventory.stokmasuk.index', compact('data'));
    }

    public function create()
    {
        return view('admin.inventory.stokmasuk.create');
    }

    public function edit($id)
    {
        $data = ModelStokMasuk::findOrFail($id);
        return view('admin.inventory.stokmasuk.edit', compact('data'));
    }

    public function show($id)
    {
        $data = ModelStokMasuk::with('bahanbaku')->findOrFail($id);
        return view('admin.inventory.stokmasuk.show', compact('data'));
    }
}