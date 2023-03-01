<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Pembayaran;
use App\Models\Spp;
use PDF;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{



    public function index()
    {
        $siswa = User::where('level', 'siswa')->get();

        return view('admin.pembayaran', compact('siswa'));
    }


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


    public function show($id)
    {
        $pembayaran = Pembayaran::where('id_siswa', $id)->get();
        $spp = Spp::all();
        $siswa = Siswa::where('id', $id)->first();

        return view('admin.detail_pembayaran', compact('pembayaran', 'spp', 'siswa'));
    }

    public function destroy($id)
    {
        Pembayaran::where('id', $id)->delete();

        return back();
    }

    public function cetak(Request $request, $id)
    {

        $pembayaran = Pembayaran::where('id_siswa', $id)->get();

    	$pdf = PDF::loadview('admin.detail_pembayaran_pdf', [
            'pembayaran'=> $pembayaran,
        ]);
    	return $pdf->download('detail_pembayaran_pdf.pdf');
    }
}


