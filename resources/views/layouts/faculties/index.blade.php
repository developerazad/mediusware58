@extends('layouts.master')

@section('content')
    @if(count($faculties) > 0)
        <table class="table">
            <thead class="thead-light">
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

        <a href="{{ url('faculties/create') }}"><button class="btn btn-info float-left">Add New</button></a>
        <span class="float-right">{{ $faculties->links() }}</span>

    @else
        <a href="{{ url('faculties/create') }}"><button class="btn btn-info float-left">Add New</button></a>
        <p class="text-center">No Faculties were found.</p>
    @endif
@endsection