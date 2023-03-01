<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

   protected $table = 'siswa';

    protected $primarykey = 'id';

    protected $fillable = [
        'id_users',
        'nisn',
        'nis',
        'name',
        'id_kelas',
        'no_telp',
        'created_at',
        'updated_at'
    ];

    public function pembayaran()
    {
        return $this->hasMany('App\Models\Pembayaran', 'id_siswa', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'id_users', 'id');
    }
}
