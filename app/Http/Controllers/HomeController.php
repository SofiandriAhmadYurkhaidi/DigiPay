<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kelas = Kelas::count();
        $spp = Spp::count();
        $siswa = Siswa::count();
        $petugas = Petugas::count();
        $data_petugas = User::where('level', 'petugas')->get();

        return view('dashboard', [
            'kelas' => $kelas,
            'spp' => $spp,
            'siswa' => $siswa,
            'petugas' => $petugas,
            'data_petugas' => $data_petugas
        ]);


    }
}
