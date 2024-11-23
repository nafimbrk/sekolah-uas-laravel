<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nisn', 'nama', 'alamat', 'kelas'];

    public function spp()
    {
        return $this->hasMany(Spp::class, 'siswa_id', 'id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}

