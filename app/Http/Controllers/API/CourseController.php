<?php

namespace App\Http\Controllers\API;

use App\Course;
use App\LecturerCourse;
use App\Semester;
use App\StudentCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $this->validate($request,[
            'course_code' => 'required|string',
            'course_name' => 'required|string',
            'number_of_credits' => 'required|integer',
            'semester_id' => 'required|integer'
        ]);
        $course = Course::create([
            'course_code' => $request['course_code'],
            'course_name' => $request['course_name'],
            'number_of_credits' => $request['number_of_credits'],
            'lecturer_id' => $request['lecturer_id'],
            'semester_id' => $request['semester_id'],
        ]);
        return response()->json($course, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where('id','=', $id)->with('semester','lecturer')->first();
        return response()->json($course,200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getSemesters(){
        $semesters = Semester::all()->sortBy('id');
        $semesters->values()->all();
        return response()->json($semesters, 200);
    }
    public function getCoursesByStudentID($student_id)
    {
        $courses = StudentCourse::where('student_id', '=', $student_id)->get();
        $courses_collection = collect(new Course);
        foreach ($courses as $item) {
            $course = Course::where('id', '=', $item->course_id)->first();
            $courses_collection->push($course);
        }
        return response()->json($courses_collection, 200, ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
    public function getCoursesByLecturerID($lecturer_id){
        $courses = Course::where('lecturer_id','=',$lecturer_id)->get();
        return response()->json($courses, 200, ['Content-type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
