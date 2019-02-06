<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $course;

    public function __constuct(Course $course){
        $this->course = $course;
    }
    public function index()
    {
        $data['results']= Course::orderBY('created_at','desc')->get();
        return response()->json([
            'data'=> $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $course = (new Course())->saveCourse($request);
        return response()->json([
            'success' => true,
            'message' => 'Course Added Successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($course_id)
    {
      
        $coures = Course::find($course_id); 
        return view('coures::show', ['course' => $coures]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    // public function edit(Course $course,$coures_id)
    // {
    //     // $course = Course::find($coures_id);
    //     // return view('course/edit',['course'=>$coures]);

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course_id)
    {   
        $course = (new Course())->updateCourse($request, $course_id);
        return response()->json([
            'success' => true,
            'message' => 'Course with id' .$course_id. 'Successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course = Course::findOrFail($course_id);
        $couses->delete();
        return redirect('/course/index')->with('success','Information has been  deleted');
    }
}
