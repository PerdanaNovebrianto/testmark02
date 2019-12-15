<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Assesment;
use App\Question;
use App\AnswerAssesment;

class AdminController extends Controller{
    public function dashboard(){
        $users = User::count();
        $assesments = Assesment::count();
        $questions = Question::count();
        return view('admin/dashboard', [
            'title' => 'Dashboard',
            'users' => $users,
            'assesments' => $assesments,
            'questions' => $questions
        ]);
    }
    public function assesment_detail($id){
        $assesments = AnswerAssesment::where('user_id', $id)->get();
        return view('admin/user/assesment_detail', [
            'title' => 'Detail Assesment',
            'assesments' => $assesments
        ]);
    }
}