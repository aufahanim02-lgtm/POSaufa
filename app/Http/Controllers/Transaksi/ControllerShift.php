<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelShift;

class ControllerShift extends Controller
{
    // Halaman shift (status shift sekarang)
    public function index()
    {
        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->first();

        return view('kasir.shift.index', compact('shiftAktif'));
    }

    // FORM buka shift
    public function bukaShift()
    {
        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->first();

        // kalau shift masih open, jangan buka lagi
        if ($shiftAktif) {
            return redirect()->route('shift.index')
                ->with('error', 'Shift masih OPEN, tidak bisa buka shift baru!');
        }

        return view('kasir.shift.bukashift');
    }

    // PROSES buka shift (POST)
    public function prosesBukaShift(Request $request)
    {
        $request->validate([
            'saldoawal' => 'required|numeric|min:0',
        ]);

        // cek shift open
        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->first();

        if ($shiftAktif) {
            return redirect()->route('shift.index')
                ->with('error', 'Shift masih OPEN, tidak bisa buka shift baru!');
        }

        ModelShift::create([
            'userid' => Auth::id(),
            'shiftmulai' => now(),
            'shiftselesai' => null,
            'saldoawal' => $request->saldoawal,
            'saldoakhir' => 0,
            'totaltransaksi' => 0,
            'status' => 'open',
        ]);

        return redirect()->route('shift.index')
            ->with('success', 'Shift berhasil dibuka!');
    }

    // FORM tutup shift
    public function tutupShift()
    {
        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->first();

        if (!$shiftAktif) {
            return redirect()->route('shift.index')
                ->with('error', 'Tidak ada shift OPEN untuk ditutup!');
        }

        return view('kasir.shift.tutupshift', compact('shiftAktif'));
    }

    // PROSES tutup shift (POST)
    public function prosesTutupShift(Request $request)
    {
        $request->validate([
            'saldoakhir' => 'required|numeric|min:0',
        ]);

        $shiftAktif = ModelShift::where('userid', Auth::id())
            ->where('status', 'open')
            ->first();

        if (!$shiftAktif) {
            return redirect()->route('shift.index')
                ->with('error', 'Tidak ada shift OPEN untuk ditutup!');
        }

        $shiftAktif->update([
            'shiftselesai' => now(),
            'saldoakhir' => $request->saldoakhir,
            'status' => 'closed',
        ]);

        return redirect()->route('shift.index')
            ->with('success', 'Shift berhasil ditutup!');
    }
}