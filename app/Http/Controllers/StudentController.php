<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $student;
    public function __construct(Student $student){
        $this->student = $student;
    }
    public function index()
    {
        //$data= Student::orderBY('created_at','desc')->get();

        //$data = $this->student->get();
        //query
       // $student = $this->student->where('full_name','Manish Shrestha')->first();
       //$email = $this->student->where('full_name','Manish Shrestha')->value('email');
       //$student = $this->student->pluck('full_name');
       //$student = $this->student->where('full_name','Manish Shrestha')->pluck('full_name');
       
        //  $this->student->where('active',false)
        //     ->chunkById(100,function($student){
        //         $this->student->where('student_id',$student->id)
        //         ->update(['active'=>true]);
        //     });
        //$student = $this->student->count();
        

        //dd($student);
           // $student = $this->student->distinct()->get();
           //select specifying a select clause
        //    $query = $this->student->select('full_name');
        // $student = $query->addSelect('phone')->get();

        //raw expressions
        // $student = $this->student
        //                 ->select($this->student::raw('count(*) as student_count,status'))
        //                 ->where('status','<>',1)
        //                 ->groupBy('status')
        //                 ->get();

        //

        return response()->json([
            'data'=> $student,
        ]);
        // return response()->json([
        //     'data'=> $data,
        // ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($student_id)
    {
        $data = $this->student->where('student_id',$student_id)->get();
        return response()->json([
            'data'=> $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->student->saveStudent($request);
        return response()->json([
            'success' => true,
            'message' => 'Student Added Successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student,$student_id)
    {
        $student = Student::find($student_id); 
        return view('student::show', ['student' => $student]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$student_id)
    {
         $this->student->updateStudent($request, $student_id);
       // dd($student);
       $data = $this->student->where('student_id',$student_id)->get();
        return response()->json([
            'success' => true,
            'message' => 'Student with id' .$student_id. 'Successfully',
             'data' => $data

        ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id)
    {
        $student = Student::find($student_id);
        if(! $student){
            return response()->json([
                'success'=>false,
                'message'=>'Student with id ' .$student_id. ' not found '
        ]);
        }
        if($student->destroy($student_id)){
            return response()->json([
                'success'=>true,
                'message'=>'Student with id ' .$student_id. ' successfully deleted'
        ]);
        }

    }
}
