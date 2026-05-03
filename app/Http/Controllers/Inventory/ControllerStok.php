<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelStok;

class ControllerStok extends Controller
{
    public function index()
    {
        $data = ModelStok::with('bahanbaku')->orderBy('id', 'desc')->get();
        return view('admin.inventory.stok.index', compact('data'));
    }

    public function create()
    {
        return view('admin.inventory.stok.create');
    }

    public function edit($id)
    {
        $data = ModelStok::findOrFail($id);
        return view('admin.inventory.stok.edit', compact('data'));
    }

    public function show($id)
    {
        $data = ModelStok::with('bahanbaku')->findOrFail($id);
        return view('admin.inventory.stok.show', compact('data'));
    }
}