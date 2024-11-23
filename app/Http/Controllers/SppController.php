<?php



namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::with('siswa')->get();
        return view('spp.index', compact('spp'));
    }
    

    public function create()
{
    $siswa = Siswa::all();
    return view('spp.create', compact('siswa'));
}


public function store(Request $request)
{
    $request->validate([
        'siswa_id' => 'required|exists:siswa,id',
        'nominal' => 'required|numeric',
        'batas_waktu' => 'required|date',
    ]);

    Spp::create($request->all());
    return redirect()->route('spp.index')->with('success', 'SPP berhasil ditambahkan.');
}


public function edit($id)
{
    $spp = Spp::find($id);
    if (!$spp) {
        return redirect()->route('spp.index')->with('error', 'Data SPP tidak ditemukan.');
    }

    $siswa = Siswa::all();
    return view('spp.edit', compact('spp', 'siswa'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'siswa_id' => 'required|exists:siswa,id',
        'nominal' => 'required|numeric',
        'batas_waktu' => 'required|date',
    ]);

    $spp = Spp::find($id);
    if (!$spp) {
        return redirect()->route('spp.index')->with('error', 'Data SPP tidak ditemukan.');
    }

    $spp->update($request->all());
    return redirect()->route('spp.index')->with('success', 'SPP berhasil diupdate.');
}


public function destroy($id)
{
    $spp = Spp::find($id);
    if (!$spp) {
        return redirect()->route('spp.index')->with('error', 'Data SPP tidak ditemukan.');
    }

    $spp->delete();
    return redirect()->route('spp.index')->with('success', 'SPP berhasil dihapus.');
}

}
