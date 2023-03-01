<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = User::where('level', 'petugas')->get();

        return view('admin.petugas', compact('petugas'));
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
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => "petugas"
        ]);



        Petugas::create([
            'id_users' => $user->id,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
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
        //
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
        $data =[
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => "petugas"
        ];

        if ($request->password !== '') {
            $data['password'] = Hash::make($request->password);
        }

        $user = User::find($id);
        $user->update($data);


        Petugas::where('id_users', $id)->update([
            'id_users' => $id,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
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
        Petugas::where('id_users', $id)->delete();
        User::where('id', $id)->delete();

        return back();
    }
}
