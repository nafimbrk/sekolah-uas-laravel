<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Spp;
use App\Models\PaymentPivot;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('spp')->get();

        return view('pembayaran.index', compact('siswas'));
    }

public function bayar(Request $request, $sppId)
{
    $request->validate([
        'jumlah' => 'required|numeric',
    ]);

    $spp = Spp::findOrFail($sppId);

    $siswa = $spp->siswa;

    Pembayaran::create([
        'siswa_id' => $siswa->id,
        'spp_id' => $spp->id,
        'jumlah' => $request->jumlah,
        'tanggal_pembayaran' => now(),
        'kode_bukti' => strtoupper(uniqid('SPP-')),
    ]);

    $spp->update(['is_paid' => true]);

    return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dilakukan.');
}


public function history()
{
    $pembayaran = Pembayaran::with('siswa', 'spp')->get();

    return view('pembayaran.history', compact('pembayaran'));
}


public function cetakBukti($id)
{
    $pembayaran = Pembayaran::with('siswa', 'spp')->findOrFail($id);

    return view('pembayaran.cetak_bukti', compact('pembayaran'));
}

}
