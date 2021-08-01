<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\StudentMark;
use App\Model\Term;
use App\Model\Teacher;


class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $studentmarks = StudentMark::all() ;
        $students = Student::all() ;
        $terms = Term::all() ;
        return view('studmark',['studentmarks'=>$studentmarks,'students'=>$students,'terms'=>$terms,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studmarks = StudentMark::all() ;
        $students = Student::all() ;
        $terms = Term::all() ;
        return view('studmark',['studentmarks'=>$studentmarks,'students'=>$students,'terms'=>$terms,'layout'=>'create']);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studmarks = new StudentMark() ;
        //$student->studid = $request->input('studid') ;
        $studmarks->studName = $request->input('studname') ;
        $studmarks->term= $request->input('term') ;
       /* $studmarks->maths = $request->input('maths') ;
        $studmarks->science = $request->input('science') ;
        $studmarks->history = $request->input('history') ;
        $studmarks->totalmark = $request->input('totalmark') ;*/
        $studmarks->save() ;
        return redirect('/') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studmarks = StudentMark::find($id);
        $studmarks = Student::all() ;
        return view('student',['studmarks'=>$studmarks,'studmark'=>$studmarks,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studmarks = StudentMark::find($id);
        $studmarks = StudentMark::all() ;
        return view('student',['studmarks'=>$studmarks,'studmark'=>$studmarks,'layout'=>'edit']);
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
      $studmarks = StudentMark::find($id);
      //$student->studid = $request->input('studid') ;
     // $studmarks->studname = $request->input('studname') ;
      $studmarks->maths = $request->input('maths') ;
      $studmarks->science= $request->input('science') ;
      $studmarks->history= $request->input('history') ;
      $studmarks->totalmarks= $request->input('totalmarks') ;
      $studmarks->save() ;
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
        $studmarks = StudentMark::find($id);
        $studmarks->delete() ;
        return redirect('/') ;
    }
}
