<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $primarykey = 'id';

    protected $fillable = [
        'id_petugas',
        'id_siswa',
        'tanggal_bayar',
        'bulan_bayar',
        'tahun_bayar',
        'jumlah_bayar'
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'id_siswa', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Models\Petugas', 'id_petugas', 'id');
    }
}
