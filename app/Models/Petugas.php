<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $primarykey = 'id';

    protected $fillable = [
        'id_users',
        'name',
        'alamat',
        'no_telp',
        'created_at',
        'updated_at'
    ];
    public function pembayaran()
    {
        return $this->hasMany('App\Models\Pembayaran', 'id_siswa', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'id_users', 'id');
    }
}
