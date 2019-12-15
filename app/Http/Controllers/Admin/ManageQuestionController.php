<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use File;
use App\Question;

class ManageQuestionController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $questions = Question::orderBy('id', 'desc')->get();
        return view('admin/question/view', [
            'title' => 'Manajemen Soal',
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin/question/create', [
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
        $gambar = '';
        if ($request->hasFile('gambar_soal')){
            $image = $request->file('gambar_soal');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $upload_path = public_path('assets/image/soal');
            $image->move($upload_path, $image_name);
            $gambar = $image_name;
        }
        $pertanyaan = $request->pertanyaan;
        $jawaban_benar = $request->jawaban_benar;
        $jawaban_salah1 = $request->jawaban_salah1;
        $jawaban_salah2 = $request->jawaban_salah2;
        $jawaban_salah3 = $request->jawaban_salah3;
        Question::create([
            'gambar' => $gambar,
            'pertanyaan' => $pertanyaan,
            'jawaban_benar' => $jawaban_benar,
            'jawaban_salah1' => $jawaban_salah1,
            'jawaban_salah2' => $jawaban_salah2,
            'jawaban_salah3' => $jawaban_salah3,
            'user_id' => Auth::user()->id
        ]);
        return redirect('/admin/question')->with('message', 'Soal berhasil ditambahkan.');
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
        $question = Question::find($id);
        return view('admin/question/edit', [
            'title' => 'Manajemen Question',
            'question' => $question
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
        $gambar_lama = $request->gambar_lama;
        $gambar_baru = $request->gambar_baru;
        if($request->hasFile('gambar_soal')){
            $image = $request->file('gambar_soal');
            $gambar_baru = time().'.'.$image->getClientOriginalExtension();
        }
        if($gambar_lama != $gambar_baru){
            if($gambar_lama == ''){
                if ($request->hasFile('gambar_soal')){
                    $image = $request->file('gambar_soal');
                    $image_name = time().'.'.$image->getClientOriginalExtension();
                    $upload_path = public_path('assets/image/soal');
                    $image->move($upload_path, $image_name);
                    $gambar = $image_name;
                }
            }
            if($gambar_lama != ''){
                if ($request->hasFile('gambar_soal')){
                    $image_path = public_path('assets/image/soal/'.$request->gambar_lama);
                    if(File::exists($image_path)){
                        File::delete($image_path);
                        $image = $request->file('gambar_soal');
                        $image_name = time().'.'.$image->getClientOriginalExtension();
                        $upload_path = public_path('assets/image/soal');
                        $image->move($upload_path, $image_name);
                        $gambar = $image_name;
                    }
                }
                else{
                    $image_path = public_path('assets/image/soal/'.$request->gambar_lama);
                    if(File::exists($image_path)){
                        File::delete($image_path);
                        $gambar = '';
                    }
                }
            }
        }
        else{
            $gambar = $gambar_lama;
        }
        $pertanyaan = $request->pertanyaan;
        $jawaban_benar = $request->jawaban_benar;
        $jawaban_salah1 = $request->jawaban_salah1;
        $jawaban_salah2 = $request->jawaban_salah2;
        $jawaban_salah3 = $request->jawaban_salah3;
        Question::find($id)->update([
            'gambar' => $gambar,
            'pertanyaan' => $pertanyaan,
            'jawaban_benar' => $jawaban_benar,
            'jawaban_salah1' => $jawaban_salah1,
            'jawaban_salah2' => $jawaban_salah2,
            'jawaban_salah3' => $jawaban_salah3
        ]);
        return redirect('/admin/question')->with('message', 'Soal berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $question = Question::find($id);
        $image_path = public_path('assets/image/soal/'.$question->gambar);
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        Question::destroy($id);
        return redirect('/admin/question')->with('message', 'Soal berhasil dihapus.');
    }
}
