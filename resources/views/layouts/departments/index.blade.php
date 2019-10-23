@extends('layouts.master')

@section('content')
    @if(count($departments) > 0)
        <table class="table">
            <thead class="thead-light">
                <tr class="bg-info">
                    <th scope="col">Sl.</th>
                    <th scope="col">Dept. Name</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($departments as $key => $department)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $department->dept_name }}</td>
                    <td>{{ $department->faculty->faculty_name }}</td>
                    <td>
                        @if($department->active_fg==1)
                            <button class="btn-xs btn-success">Active</button>
                        @else
                            <button class="btn-xs btn-info">Inactive</button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('departments/'.$department->id.'/edit') }}"><button class="btn-xs btn-info">Edit</button></a>|
                        <button class="btn-xs btn-danger deleteRow" data-action="{{ url('departments/'.$department->id) }}">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ url('departments/create') }}"><button class="btn btn-info float-left">Add New</button></a>
        <span class="float-right">{{ $departments->links() }}</span>
    @else
        <a href="{{ url('departments/create') }}"><button class="btn btn-info float-left">Add New</button></a>
        <p class="text-center">No Departments were found</p>
    @endif
@endsection