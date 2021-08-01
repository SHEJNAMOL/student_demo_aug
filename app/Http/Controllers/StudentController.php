<?php

namespace App\Http\Controllers;
use App\Model\Student;
use App\Model\Standard;
use App\Model\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all() ;
        $standards = Standard::all() ;
        $teachers=Teacher::all();
        // return view('student',['students'=>$students,'layout'=>'index']);
        return view('student',['students'=>$students,'standards'=>$standards,'teachers'=>$teachers,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
if($request->method()=='GET')
{
      
      $students = Student::all();
      $standards = Standard::all() ;
      $teachers=Teacher::all();
      return view('student',['students'=>$students,'standards'=>$standards,'teachers'=>$teachers,'layout'=>'create']);
}
if($request->method()=='POST')
{
        $student = new Student() ;
        //$student->studid = $request->input('studid') ;
        $student->student_name = $request->input('student_name') ;
        $student->gender= $request->input('gender') ;
        $student->age = $request->input('age') ;
        $teacher_id=$request->input('teacher_id') ;
        $teacher= new Teacher();
        $class_id=$teacher->getClassIdByTeacherId($teacher_id);
        $student->class_id=$class_id;
        $student->save() ;
        return redirect('/') ;
    }
  }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student = Student::where('student_id', $id)->first();
      $students = Student::all() ;
      $standards = Standard::all() ;
      $teachers=Teacher::all();
      return view('student',['students'=>$students,'student'=>$student,'teachers'=>$teachers,'layout'=>'edit']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $id=$request->input('student_id');
      $student = Student::where('student_id', $id)->first();
      
      $student->student_name = $request->input('student_name') ;

        $student->gender= $request->input('gender') ;
        $student->age = $request->input('age') ;
        $teacher_id=$request->input('teacher_id') ;
        $teacher= new Teacher();
        $class_id=$teacher->getClassIdByTeacherId($teacher_id);
        $student->class_id=$class_id;
        //print_r($student);die;
        $student->save() ;
      return redirect('/') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $student = Student::where('student_id', $id)->first();
      $student->delete() ;
      return redirect('/') ;
    }

    
}
