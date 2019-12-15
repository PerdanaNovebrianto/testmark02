<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\Desa;
use App\Kecamatan;
use App\Puskesmas;
use App\Assesment;
use App\AnswerAssesment;
use App\Question;
use App\Answer;

class ApiController extends Controller{
    public function kecamatan(){
        $kecamatan = Kecamatan::get();
        return response()->json([
            'status' => 'true',
            'data' => $kecamatan
        ]);
    }
    
    public function desa($id){
        $desa = Desa::where('KodeKecamatan', $id)->get();
        return response()->json([
            'status' => 'true',
            'data' => $desa
        ]);
    }
    
    public function puskesmas(){
        $puskesmas = Puskesmas::get();
        return response()->json([
            'status' => 'true',
            'data' => $puskesmas
        ]);
    }
    
    public function check_email(Request $request){
        $email = $request->email;
        $check = User::where('email', $email)->count();
        if($check > 0){
            $user = User::where('email', $email)->first();
            $hashed = Crypt::encryptString($user->id);
            $tanggal = explode('-', $user->tanggal_lahir_pria);
            $tanggal_lahir_pria = $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];
            $tanggal = explode('-', $user->tanggal_lahir_wanita);
            $tanggal_lahir_wanita = $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];
            return response()->json([
                'status' => 'true',
                'id' => $user->id,
                'email' => $user->email,
                'password_web' => $user->password_web,
                'nama_pria' => $user->nama_pria,
                'nama_wanita' => $user->nama_wanita,
                'nik_pria' => $user->nik_pria,
                'nik_wanita' => $user->nik_wanita,
                'tanggal_lahir_pria' => $tanggal_lahir_pria,
                'tanggal_lahir_wanita' => $tanggal_lahir_wanita,
                'no_hp' => $user->no_hp,
                'desa' => $user->desa,
                'kecamatan' => $user->kecamatan,
                'puskesmas' => $user->puskesmas,
                'status_assesment' => $user->status_assesment,
                'status_kelulusan' => $user->status_kelulusan,
                'url_cetak' => $hashed
            ]);
        }
        else{
            return response()->json([
                'status' => 'false',
                'message' => 'Belum terdaftar'
            ]);
        }
    }
    
    public function register(Request $request){
        $email = $request->email;
        $nama_pria = $request->nama_pria;
        $nama_wanita = $request->nama_wanita;
        $nik_pria = $request->nik_pria;
        $nik_wanita = $request->nik_wanita;
        $tanggal_lahir_pria = $request->tanggal_lahir_pria;
        $tanggal_lahir_wanita = $request->tanggal_lahir_wanita;
        $no_hp = $request->no_hp;
        $desa = $request->desa;
        $kecamatan = $request->kecamatan;
        $puskesmas = $request->puskesmas;
        $check_nik_pria = User::where('nik_pria', $nik_pria)->count();
        if($check_nik_pria > 0){
            return response()->json([
                'status' => 'false',
                'message' => 'NIK Pria sudah terdaftar.'
            ]);
        }
        else{
            $check_nik_wanita = User::where('nik_wanita', $nik_wanita)->count();
            if($check_nik_pria > 0){
                return response()->json([
                    'status' => 'false',
                    'message' => 'NIK Wanita sudah terdaftar.'
                ]);
            }
            else{
                if($nik_pria === $nik_wanita){
                    return response()->json([
                        'status' => 'false',
                        'message' => 'NIK Pria & NIK Wanita tidak boleh sama.'
                    ]);
                }
                else{
                    $password = Str::random(12);
                    $password = str_split($password, 4);
                    $password = $password[0].'-'.$password[1].'-'.$password[2];
                    $password = strtoupper($password);
                    User::create([
                        'email' =>  $email,
                        'password' => bcrypt($password),
                        'password_web' => $password,
                        'nama_pria' =>  $nama_pria,
                        'nama_wanita' =>  $nama_wanita,
                        'nik_pria' =>  $nik_pria,
                        'nik_wanita' =>  $nik_wanita,
                        'tanggal_lahir_pria' =>  $tanggal_lahir_pria,
                        'tanggal_lahir_wanita' =>  $tanggal_lahir_wanita,
                        'no_hp' => $no_hp,
                        'desa' =>  $desa,
                        'kecamatan' =>  $kecamatan,
                        'puskesmas' => $puskesmas,
                        'status_assesment' => 'false',
                        'status_kelulusan' => 'false',
                        'role' => 'user'
                    ]);
                    $user = User::where('email', $email)->first();
                    $hashed = Crypt::encryptString($user->id);
                    $tanggal = explode('-', $user->tanggal_lahir_pria);
                    $tanggal_lahir_pria = $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];
                    $tanggal = explode('-', $user->tanggal_lahir_wanita);
                    $tanggal_lahir_wanita = $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];
                    return response()->json([
                        'status' => 'true',
                        'message' => 'Pendaftaran berhasil.',
                        'id' => $user->id,
                        'email' => $user->email,
                        'password_web' => $user->password_web,
                        'nama_pria' => $user->nama_pria,
                        'nama_wanita' => $user->nama_wanita,
                        'nik_pria' => $user->nik_pria,
                        'nik_wanita' => $user->nik_wanita,
                        'tanggal_lahir_pria' => $tanggal_lahir_pria,
                        'tanggal_lahir_wanita' => $tanggal_lahir_wanita,
                        'no_hp' => $user->no_hp,
                        'desa' => $user->desa,
                        'kecamatan' => $user->kecamatan,
                        'puskesmas' => $user->puskesmas,
                        'status_assesment' => $user->status_assesment,
                        'status_kelulusan' => $user->status_kelulusan,
                        'url_cetak' => $hashed
                    ]);
                }
            }
        }
    }
    
    public function assesments(){
        $assesments = Assesment::get();
        return response()->json([
            'status' => 'true',
            'data' => $assesments
        ]);
    }
    
    public function store_assesments(Request $request){
        $user_id = $request->user_id;
        $data = $request->data;
        $jsons = json_decode($data, true);
        foreach($jsons as $json){
            AnswerAssesment::create([
                'pertanyaan' =>  $json['pertanyaan'],
                'jawaban' => $json['jawaban'],
                'user_id' => $user_id
            ]);
        }
        User::find($user_id)->update([
            'status_assesment' => 'true',
        ]);
        $user = User::find($user_id);
        return response()->json([
            'status' => 'true',
            'message' => 'Assesment berhasil ditambahkan, silahkan download assesment.',
            'status_assesment' => $user->status_assesment
        ]);
    }

    public function questions(){
        $questions = Question::get();
        return response()->json([
            'status' => 'true',
            'data' => $questions
        ]);
    }
    
    public function store_questions(Request $request){
        $user_id = $request->user_id;
        $data = $request->data;
        $jsons = json_decode($data, true);
        $jumlah = count($jsons);
        $benar = 0;
        foreach($jsons as $json){
            if($json['jawaban'] == 'Benar'){
                $benar++;
            }
            Answer::create([
                'pertanyaan' =>  $json['pertanyaan'],
                'jawaban' => $json['jawaban'],
                'user_id' => $user_id
            ]);
        }
        $nilai = ($benar / $jumlah) * 100;
        if($nilai >= 80){
            User::find($user_id)->update([
                'status_kelulusan' => 'true',
            ]);
            $user = User::find($user_id);
            return response()->json([
                'status' => 'true',
                'message' => 'Selamat anda sudah lulus, silahkan download sertifikat.',
                'status_kelulusan' => $user->status_kelulusan
                
            ]);
        }
        else{
            return response()->json([
                'status' => 'false',
                'message' => 'Belum lulus.'
                
            ]);
        }
    }
    
    public function questions_history(Request $request){
        $user_id = $request->user_id;
        $percobaan = Answer::where('user_id', $user_id)->groupBy('created_at')->get();
        $data = [];
        $no = 1;
        foreach($percobaan as $coba){
            $tanggal = $coba->created_at;
            $jawaban = Answer::where([['user_id', $user_id],['created_at', $tanggal ]])->get();
            $jumlah = Answer::where([['user_id', $user_id],['created_at', $tanggal ]])->count();
            $benar = 0;
            foreach($jawaban as $jawab){
                if($jawab->jawaban == 'Benar'){
                    $benar++;
                }
            }
            $tanggal_explode = explode(' ', $tanggal);
            $tanggal_explode1 = explode('-', $tanggal_explode[0]);
            $tanggal_explode2 = $tanggal_explode1[2].'-'.$tanggal_explode1[1].'-'.$tanggal_explode1[0].' '.$tanggal_explode[1];
            $nilai = ceil(($benar / $jumlah) * 100);
            if($nilai >= 80){
                $status_kelulusan = 'Lulus';
            }
            else{
                $status_kelulusan = 'Belum Lulus';
            }
            $data[] = [
                'percobaan' => $no,
                'tanggal' => $tanggal_explode2,
                'nilai' =>  $nilai,
                'status_kelulusan' => $status_kelulusan
            ];
            $no++;
        }
        return response()->json([
            'status' => 'true',
            'data' => $data
        ]);
    }
}
