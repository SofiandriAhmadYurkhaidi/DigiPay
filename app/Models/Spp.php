<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;

    protected $table = 'spp';

    protected $primarykey = 'id';

    protected $fillable = [
        'tahun',
        'bulan',
        'nominal',
        'cerated_at',
        'updated_at'
    ];
}
