<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\Answer;
use App\AnswerAssesment;
use App\Puskesmas;
use PDF;

class UserController extends Controller{
    public function materi($id){
        if($id == 1){
            return view('user/materi_01');
        }
        if($id == 2){
            return view('user/materi_02');
        }
        if($id == 3){
            return view('user/materi_03');
        }
        if($id == 4){
            return view('user/materi_04');
        }
        if($id == 5){
            return view('user/materi_05');
        }
    }

    public function cetak_assesment($hashed){
        $id = Crypt::decryptString($hashed);
        $user = User::find($id);
        $assesments = AnswerAssesment::where('user_id', $id)->get();
        $pdf = PDF::loadview('user/cetak_assesment', ['user' => $user, 'assesments' => $assesments])->setPaper('A4');
        return $pdf->stream("assesment.pdf", array('Attachment' => false));
    }
    
    public function cetak_sertifikat($hashed){
        $id = Crypt::decryptString($hashed);
        $user = User::find($id);
        $puskesmas = Puskesmas::where('Kode', $user->puskesmas)->first();
        $answer = Answer::where('user_id', $id)->orderBy('id', 'desc')->first();
        $tanggal = date('d-m-Y');
        $pdf = PDF::loadview('user/cetak_sertifikat', ['user' => $user, 'puskesmas' => $puskesmas, 'answer' => $answer, 'tanggal' => $tanggal])->setPaper('A4', 'landscape');
        return $pdf->stream("sertifikat.pdf", array('Attachment' => false));
    }
}
