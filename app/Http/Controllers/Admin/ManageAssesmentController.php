<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Assesment;

class ManageAssesmentController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $assesments = Assesment::orderBy('id', 'desc')->get();
        return view('admin/assesment/view', [
            'title' => 'Manajemen Assesment',
            'assesments' => $assesments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin/assesment/create', [
            'title' => 'Manajemen Assesment'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $pertanyaan = $request->pertanyaan;
        Assesment::create([
            'pertanyaan' => $pertanyaan,
            'user_id' => Auth::user()->id
        ]);
        return redirect('/admin/assesment')->with('message', 'Assesment berhasil ditambahkan.');
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
        $assesment = Assesment::find($id);
        return view('admin/assesment/edit', [
            'title' => 'Manajemen Assesment',
            'assesment' => $assesment
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
        $pertanyaan = $request->pertanyaan;
        Assesment::find($id)->update([
            'pertanyaan' => $pertanyaan,
        ]);
        return redirect('/admin/assesment')->with('message', 'Assesment berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Assesment::destroy($id);
        return redirect('/admin/assesment')->with('message', 'Assesment berhasil dihapus.');
    }
}
