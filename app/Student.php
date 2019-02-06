<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
protected $table ="students";
protected $primaryKey ="student_id";
protected $foreignKey ="course_id";
protected $fillable = ['course_id','full_name','email','address','phone'];
//save the student data
public function saveStudent($request){
    $data = [
        'course_id' => $request->get('course_id'),
        'full_name' => $request->get('full_name'),
        'email'=> $request->get('email'),
        'address' => $request->get('address'),
        'phone'=> $request->get('phone')
           
    ];
    //dd($data);	
    
 return self::create($data);
 
}
//update the student data
public function updateStudent($request,$student_id){
    
    $student = self::find($student_id);
    //dd($student); 
    $data = [
        'course_id' => $request->get('course_id'),
        'full_name' => $request->get('full_name'),
        'email'=> $request->get('email'),
        'address' => $request->get('address'),
        'phone'=> $request->get('phone')
        
    ];	
    // dd($data);
    return $student->update($data);
}
}
