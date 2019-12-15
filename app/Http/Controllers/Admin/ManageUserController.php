<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Desa;
use App\Kecamatan;
use App\Puskesmas;

class ManageUserController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::orderBy('id', 'desc')->get();
        return view('admin/user/view', [
            'title' => 'Manajemen Pengguna',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = User::find($id);
        $desa = Desa::orderBy('Desa', 'asc')->groupBy('Desa')->get();
        $kecamatan = Kecamatan::orderBy('Kecamatan', 'asc')->get();
        $old_puskesmas = Puskesmas::where('Kode', $user->puskesmas)->first();
        $puskesmas = Puskesmas::orderBy('Kode', 'desc')->get();
        return view('admin/user/edit', [
            'title' => 'Manajemen Pengguna',
            'user' => $user,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'old_puskesmas' => $old_puskesmas,
            'puskesmas' => $puskesmas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $user = User::find($id);
        if($user->nik_pria != $request->nik_pria || $user->nik_wanita != $request->nik_wanita){
            $this->validate($request, [
                'nik_pria' => 'unique:users|different:nik_wanita',
                'nik_wanita' => 'unique:users|different:nik_pria'
            ]);
        }
        $desa = $user->desa;
        $kecamatan = $user->kecamatan;
        $puskesmas = $user->puskesmas;
        if($request->desa != ''){
            $desa = $request->desa;
        }
        if($request->kecamatan != ''){
            $kecamatan = $request->kecamatan;
        }
        if($request->puskesmas != ''){
            $puskesmas = $request->puskesmas;
        }
        User::find($id)->update([
            'nik_pria' => $request->nik_pria,
            'nik_wanita' => $request->nik_wanita,
            'nama_pria' => $request->nama_pria,
            'nama_wanita' => $request->nama_wanita,
            'tanggal_lahir_pria' => $request->tanggal_lahir_pria,
            'tanggal_lahir_wanita' => $request->tanggal_lahir_wanita,
            'no_hp' => $request->no_hp,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'puskesmas' => $puskesmas
        ]);
        return redirect('/admin/user')->with('message', 'Pengguna berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        User::destroy($id);
        return redirect('/admin/user')->with('message', 'Pengguna berhasil dihapus.');
    }
}
