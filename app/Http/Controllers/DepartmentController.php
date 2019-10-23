<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with('Faculty')->paginate(4);
        //$this->pr($departments);
        return view('layouts.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('layouts.departments.create', compact('faculties'));
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
            'dept_name' => 'required'
        ]);
        $department = new Department([
            'dept_name'  => $request->dept_name,
            'faculty_id' => $request->faculty_id,
            'active_fg'  => $request->active_fg
        ]);
        $department->save();
        return redirect('/departments')->with('success', 'Department added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculties  = Faculty::all();
        $department = Department::find($id);
        return view('layouts.departments.edit', compact('faculties', 'department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dept_name' => 'required',
            'faculty_id' => 'required',
        ]);
        Department::find($id)->update([
            'dept_name'  => $request->dept_name,
            'faculty_id' => $request->faculty_id,
            'active_fg'  => $request->active_fg
        ]);
        return redirect('/departments')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Department::find($id);
        $faculty->delete();
        return redirect('/departments')->with('success', 'Department deleted successfully');
    }
}
