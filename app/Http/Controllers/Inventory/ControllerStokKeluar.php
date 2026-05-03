<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelStokKeluar;

class ControllerStokKeluar extends Controller
{
    public function index()
    {
        $data = ModelStokKeluar::with('bahanbaku')->orderBy('id', 'desc')->get();
        return view('admin.inventory.stokkeluar.index', compact('data'));
    }

    public function create()
    {
        return view('admin.inventory.stokkeluar.create');
    }

    public function edit($id)
    {
        $data = ModelStokKeluar::findOrFail($id);
        return view('admin.inventory.stokkeluar.edit', compact('data'));
    }

    public function show($id)
    {
        $data = ModelStokKeluar::with('bahanbaku')->findOrFail($id);
        return view('admin.inventory.stokkeluar.show', compact('data'));
    }
}