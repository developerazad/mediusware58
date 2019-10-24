<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use App\Student;
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
        $students = Student::with('Faculty')->with('Department')->latest()->paginate(4);
        return view('layouts.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties   = Faculty::all();
        $departments = Department::all();
        return view('layouts.students.create', compact('faculties', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'student_name' => 'required',
            'student_id'   => 'required'
        ]);
        if($request->file('photo')){
            // get orginnal file name
            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            // just file name
            $file = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // just extension
            $ext  = $request->file('photo')->getClientOriginalExtension();

            // file to store
            $student_photo = $file.'_'.time().'.'.$ext;

            // move to destination
            $destination = base_path().'/public/uploads/students/';
            $request->file('photo')->move($destination, $student_photo);
        }else{
            $student_photo = 'azad.jpg';
        }
        $student = new Student([
            'student_name' => $request->student_name,
            'student_id'   => $request->student_id,
            'faculty_id'   => $request->faculty_id,
            'department_id'=> $request->department_id,
            'photo'        => $student_photo
        ]);

        $student->save();
        return redirect('/students')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculties   = Faculty::all();
        $departments = Department::all();
        $student     = Student::find($id);
        return view('layouts.students.edit', compact('faculties', 'departments','student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'student_name' => 'required',
            'student_id'   => 'required'
        ]);
        if($request->file('photo')){
            // get orginnal file name
            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            // just file name
            $file = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // just extension
            $ext  = $request->file('photo')->getClientOriginalExtension();

            // file to store
            $student_photo = $file.'_'.time().'.'.$ext;

            // move to destination
            $destination = base_path().'/public/uploads/students/';
            $request->file('photo')->move($destination, $student_photo);
        }else{
            $student_photo = 'azad.jpg';
        }
        Student::find($id)->update([
            'student_name' => $request->student_name,
            'student_id'   => $request->student_id,
            'faculty_id'   => $request->faculty_id,
            'department_id'=> $request->department_id,
            'photo'        => $student_photo
        ]);
        return redirect('/students')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Student::find($id);
        $faculty->delete();
        return redirect('/students')->with('success', 'Student deleted successfully');
    }
}
