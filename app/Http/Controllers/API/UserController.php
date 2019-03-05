<?php

namespace App\Http\Controllers\API;

use App\Lecturer;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getStudentByUserID($user_id){
        $student = Student::where('user_id','=',$user_id)->first();
        return response()->json($student, 200);
    }
    public function getLectureByUserID($user_id){
        $lecturer = Lecturer::where('user_id','=',$user_id)->first();
        return response()->json($lecturer, 200);
    }
    public function getCurrentUser(){
        $user_id = auth()->user()->id;
        if (auth()->user()->level == "student"){
            $result = $this->getStudentByUserID($user_id);
        }else {
            $result = $this->getLectureByUserID($user_id);
        }
        return $result;
    }
    public function logout(){
        if (Auth::check()){
            Auth::logout();
            return redirect('/login');
        }else {
            return redirect()->back();
        }
    }
}
