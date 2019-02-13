<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $type = auth()->user()->level;
        if ($type == "student"){
            $student = Student::where('user_id','=',auth()->user()->id)->first();
            return view('home',['student' => $student]);
        }
        $lecturer = Lecturer::where('user_id','=',auth()->user()->id)->first();
        return view('home',['lecturer' => $lecturer]);

    }
}
