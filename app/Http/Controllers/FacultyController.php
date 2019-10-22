<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
        return view('layouts.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.faculties.create');
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
            'faculty_name' => 'required'
        ]);
        $faculty = new Faculty([
            'faculty_name' => $request->input('faculty_name'),
            'faculty_desc' => $request->input('faculty_desc'),
            'active_fg'    => $request->input('active_fg')
        ]);
        $faculty->save();
        return redirect('/faculties')->with('success', 'Faculty added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::find($id);
        return view('layouts.faculties.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'faculty_name' => 'required'
        ]);
        Faculty::find($id)->update([
            'faculty_name' => $request->input('faculty_name'),
            'faculty_desc' => $request->input('faculty_desc'),
            'active_fg'    => $request->input('active_fg')
        ]);

        return redirect('/faculties')->with('success', 'Faculty updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;exit();
        $faculty = Faculty::find($id);
        $faculty->delete();
        return redirect('/faculties')->with('success', 'Faculty deleted successfully');
    }
}
