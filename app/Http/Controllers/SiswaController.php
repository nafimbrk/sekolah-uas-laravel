<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SiswaController extends Controller
{



    public function index()
        {
            $data['siswa'] =  Siswa::get();
            return view('siswa.index', $data);
        }
    
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('siswa.tambah');
        }
    
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validated = $request->validate([
                // 'nisn' => ['required', 'unique:App\s\Siswa,nisn', 'numeric'],
                'nisn' => ['required', 'numeric'],
                'nama' => ['required', 'max:50', 'min:3', 'regex:/^[A-z. \'`]+$/'],
                'alamat' => 'min:0|max:100|nullable',
                'kelas' => 'numeric|min:0|max:12|nullable'
            ]);
    
            $data = [
                'nisn' => $request->input('nisn'),
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'kelas' => $request->input('kelas')
            ];
            Siswa::insert($data);
            foreach($data as $key => $item) {
                session()->flash($key, $item);
            }
            return redirect(url('siswa'))->with('pesan', 'Data Siswa Berhasil Ditambahkan');
        }


    public function edit(string $id)
    {
        $data['siswa'] = Siswa::where('nisn', $id)->firstOr(function () {});

        if (empty($data['siswa'])) {
            return redirect('siswa');
        } else {
            return view('siswa.ubah', $data);
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            // 'nisn' => ['required', 'unique:App\s\Siswa,nisn', 'numeric'],
            'nisn' => ['required', 'numeric'],
                'nama' => ['required', 'max:50', 'min:3', 'regex:/^[A-z. \'`]+$/'],
                'alamat' => 'min:0|max:100|nullable',
                'kelas' => 'numeric|min:0|max:12|nullable'
        ]);

        $input = [
            'nisn' => $request->input('nisn'),
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'kelas' => $request->input('kelas')
        ];

        $data['siswa'] = Siswa::where('nisn', $input['nisn'])->firstOr(function () {});

        if (empty($data['siswa'])) {
            return redirect('siswa');
        } else {
            $data['siswa']->nama = $request->input('nama');
            $data['siswa']->alamat = $request->input('alamat');
            $data['siswa']->kelas = $request->input('kelas');
            $data['siswa']->save();
            return redirect(url('siswa'))->with('pesan', 'Data Siswa Berhasil Diubah');
        }
    }

    public function hapus(string $id)
    {
        $data['siswa'] = Siswa::where('nisn', $id)->firstOr(function () {});

        if (empty($data['siswa'])) {
            return redirect('siswa');
        } else {
            return view('siswa.hapus', $data);
        }
    }

    public function destroy(Request $request)
    {
        if ($request->input('nisn')) {
            $data['siswa'] = Siswa::where('nisn', $request->input('nisn'))->firstOr(function () {});
            if (!empty($data['siswa'])) {
                $data['siswa']->delete();
                return redirect('siswa')->with('pesan', 'Data Siswa Berhasil Dihapus');
            } else {
                return redirect('siswa')->with('gagal', 'Terjadi Kesalahan Saat Menghapus Data');
            }
        } else {
            return redirect('siswa');
        }
    }

    




}
