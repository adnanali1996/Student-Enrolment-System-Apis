<?php

namespace App\Http\Controllers;


use App\Models\Student;
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
        //
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
        $validated = $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
        ]);
        $student =  new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->save();
        return response('Student Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($student_id)
    {
        //
        $student = Student::findorfail($student_id);
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_id)
    {
        //
        $validated = $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
        ]);
        $student = Student::findOrFail($student_id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->update();
        return response('Student Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id)
    {
        //
        $student = Student::findOrFail($student_id);
        $student->delete();
        return response('Student Deleted');
    }
}
