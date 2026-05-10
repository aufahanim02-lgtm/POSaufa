<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelBahanBaku;

class ControllerBahanBaku extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | VIEW PATH
    |--------------------------------------------------------------------------
    */

    private function viewPath($file)
    {
        $role = Auth::user()->role;

        if ($role == 'manager') {

            return "manager.inventory.bahanbaku.$file";

        }

        return "admin.inventory.bahanbaku.$file";
    }

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $bahanbaku = ModelBahanBaku::orderBy('id', 'desc')->get();

        return view($this->viewPath('index'), compact('bahanbaku'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view(
            $this->viewPath('create')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'kodebahan' => 'required|unique:bahanbaku,kodebahan',
            'namabahan' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'hargabeli' => 'required|numeric',
        ]);

<<<<<<< HEAD
        ModelBahanBaku::create($request->all());

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan baku berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $bahanbaku = ModelBahanBaku::findOrFail($id);

        return view($this->viewPath('edit'), compact('bahanbaku'));
    }

    public function update(Request $request, $id)
    {
        // jika manager tidak boleh edit data, aktifkan ini
        if (Auth::user()->role == 'manager') {
            return redirect()->back()->with('error', 'Akses ditolak! Manager tidak boleh mengubah bahan baku.');
        }

        $data = ModelBahanBaku::findOrFail($id);

        $request->validate([
            'kodebahan' => 'required|unique:bahanbaku,kodebahan,' . $data->id,
            'namabahan' => 'required',
            'stok' => 'required|numeric',
            'satuan' => 'nullable',
            'hargabeli' => 'required|numeric'
=======
        ModelBahanBaku::create([
            'kodebahan' => $request->kodebahan,
            'namabahan' => $request->namabahan,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'hargabeli' => $request->hargabeli,
>>>>>>> 3c7e2012b50df117cad782e1aa0311d35031e1da
        ]);

        return redirect()
            ->route('inventory.bahanbaku.index')
            ->with('success', 'Data bahan baku berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
<<<<<<< HEAD
        $bahanbaku = ModelBahanBaku::findOrFail($id);

        return view($this->viewPath('show'), compact('bahanbaku'));
=======
        $data = ModelBahanBaku::findOrFail($id);

        return view(
            $this->viewPath('show'),
            compact('data')
        );
>>>>>>> 3c7e2012b50df117cad782e1aa0311d35031e1da
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $data = ModelBahanBaku::findOrFail($id);

        return view(
            $this->viewPath('edit'),
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

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

        $data->update([
            'kodebahan' => $request->kodebahan,
            'namabahan' => $request->namabahan,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'hargabeli' => $request->hargabeli,
        ]);

        return redirect()
            ->route('inventory.bahanbaku.index')
            ->with('success', 'Data bahan baku berhasil diupdate.');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $data = ModelBahanBaku::findOrFail($id);

        $data->delete();

        return redirect()
            ->route('inventory.bahanbaku.index')
            ->with('success', 'Data bahan baku berhasil dihapus.');
    }
}
