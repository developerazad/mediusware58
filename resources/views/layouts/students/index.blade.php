@extends('layouts.master')

@section('content')
    @if(count($students) > 0)
        <table class="table">
            <thead class="thead-light">
                <tr class="bg-info">
                    <th scope="col">Sl.</th>
                    <th scope="col">Name</th>
                    <th scope="col">ID No</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Department</th>
                    <th scope="col">Photo</th>
                    <th scope="col" style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $key => $student)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $student->student_name }}</td>
                    <td>ID#{{ $student->student_id }}</td>
                    <td>{{ $student->faculty->faculty_name }}</td>
                    <td>{{ $student->department->dept_name }}</td>
                    <td>
                        @if(!empty($student->photo))
                            <img src="{{ asset('/uploads/students/'.$student->photo) }}" style="width: 45px;height: 45px;">
                        @else
                            <img src="{{ asset('/uploads/students/azad.jpg') }}" style="width: 45px;height: 45px;">
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('students/'.$student->id.'/edit') }}"><button class="btn-xs btn-info">Edit</button></a>|
                        <button class="btn-xs btn-danger deleteRow" data-action="{{ url('students/'.$student->id) }}">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ url('students/create') }}"><button class="btn btn-info float-left">Add New</button></a>
        <span class="float-right">{{ $students->links() }}</span>

    @else
        <a href="{{ url('students/create') }}"><button class="btn btn-info float-left">Add New</button></a>
        <p class="text-center">No Students were found.</p>
    @endif
@endsection