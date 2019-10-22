@extends('layouts.master')

@section('content')
    <table class="table">
        <thead class="thead-dark">
            <tr class="bg-info">
                <th scope="col">Sl.</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faculties as $key => $faculty)
            <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $faculty->faculty_name }}</td>
                <td>{{ $faculty->faculty_desc }}</td>
                <td>
                    @if($faculty->active_fg==1)
                        <button class="btn-xs btn-success">Active</button>
                    @else
                        <button class="btn-xs btn-info">Inactive</button>
                    @endif
                </td>
                <td>
                    <a href="{{ url('faculties/'.$faculty->id.'/edit') }}"><button class="btn-xs btn-info">Edit</button></a>|
                    <button class="btn-xs btn-danger deleteRow" data-action="{{ url('faculties/'.$faculty->id) }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn btn-default float-left">Back</button>
    <a href="{{ url('faculties/create') }}"><button class="btn btn-info float-right">Add New</button></a>


@endsection