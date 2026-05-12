<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelProduk;
use App\Models\ModelPromo;

class ControllerLanding extends Controller
{
    // HOME
    public function home()
    {
        return view('landing.home');
    }

    // MENU
    public function menu(Request $request)
    {
        $query = ModelProduk::query();

        if ($request->q) {
            $query->where('namaproduk', 'like', '%' . $request->q . '%');
        }

        $query->where('status', 'aktif');

        $produk = $query->orderBy('id', 'desc')->get();

        return view('landing.menu', compact('produk'));
    }

    // PROMO (INI YANG FIX)
    public function promo()
    {
        $promo = ModelPromo::orderBy('id', 'desc')->get();

        return view('landing.promo', compact('promo'));
    }

    // TENTANG
    public function tentang()
    {
        return view('landing.tentang');
    }

    // KONTAK
    public function kontak()
    {
        return view('landing.kontak');
    }
}