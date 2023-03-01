<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $primarykey = 'id';

    protected $fillable = [
        'kelas', 'created_at', 'updated_at'
    ];

    public function siswa()
    {
        return $this->hasMany('App\Models\Siswa', 'id_kelas');
    }
}
