@extends('layouts.master')

@section('content')
    <form action="{{ url('students/'.$student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="student_name" class="control-label">Name</label>
            <input type="text" class="form-control" name="student_name" value="{{ $student->student_name }}" placeholder="Enter Student Name">
        </div>

        <div class="form-group">
            <label for="student_id" class="control-label">ID Card No</label>
            <input type="number" class="form-control" name="student_id" value="{{ $student->student_id }}" placeholder="Enter ID Card No">
        </div>
        <div class="form-group">
            <label for="faculty_id" class="control-label">Faculty</label>
            <select name="faculty_id" class="form-control">
                <option value="">Select One</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}" @if($faculty->id==$student->faculty_id) selected @endif >{{ $faculty->faculty_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="department_id" class="control-label">Department</label>
            <select name="department_id" class="form-control">
                <option value="">Select One</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" @if($department->id==$student->department_id) selected @endif >{{ $department->dept_name }}</option>
                @endforeach
            </select>
        </div>
        <!--photo-->
        <label for="photo" class="control-label">Photo</label>
        <img src="{{ asset('/uploads/students/'.$student->photo) }}" style="width: 35px;height: 35px;">
        <div class="custom-file form-group">
            <label for="photo" class="control-label">Photo</label>
            <input type="file" class="custom-file-input photo" name="photo" id="customFile">
            <label class="custom-file-label" for="customFile">Choose File</label>
        </div>

        <button type="submit" class="btn btn-info float-left">Submit</button>

    </form>
    <a href="{{ url('/students') }}"><button class="btn btn-default ml-2">Back</button></a>

@endsection