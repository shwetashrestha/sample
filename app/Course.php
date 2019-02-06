<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table ="courses";
    protected $primaryKey ="course_id";
    protected $fillable = ['course_name','free','start_date','end_date','description'];

    public function saveCourse($request){
		$data = [
			'course_name' => $request->get('course_name'),
            'free'=> $request->get('free'),
            'start_date' => $request->get('start_date'),
            'end_date'=> $request->get('end_date'),
            'description' => $request->get('description')
		
		];	
		
     return self::create($data);
     
    }
    public function updateCourse($request,$course_id){
        //dd($course_id);
        $course = self::find($course_id);
        //dd($course); 
		$data = [
			'course_name' => $request-> get('course_name'),
            'free'=> $request-> get('free'),
            'start_date' => $request-> get('start_date'),
            'end_date'=> $request-> get('end_date'),
            'description' => $request-> get('description')
		];	
		//dd($data);
		return $course->update($data);
    }
    public function details() 
    { 
        
            $course = Course::get();
            $data = [
                
                'course' => $course
            ]; 
       
        return response()->json(['success' => $course], $this-> successStatus); 
    }
}
