<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Spp;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class PembayaranPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::where('level', 'siswa')->get();

        return view('petugas.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $siswa = Siswa::where('id', $id)->first();

        Pembayaran::create([
            'id_petugas' => $user->petugas->id,
            'id_siswa' => $siswa->id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'bulan_bayar' => $request->bulan_bayar,
            'tahun_bayar' => $request->tahun_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::where('id_users', $id)->first();
        $pembayaran = Pembayaran::where('id_siswa', $siswa->id)->get();
        $spp = Spp::all();

        return view('admin.detail_pembayaran', compact('pembayaran', 'spp', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pembayaran::create([
            'id_petugas' => Auth::user()->id,
            'id_siswa' => $id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'bulan_bayar' => $request->bulan_bayar,
            'tahun_bayar' => $request->tahun_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembayaran::where('id', $id)->delete();

        return back();
    }
}
