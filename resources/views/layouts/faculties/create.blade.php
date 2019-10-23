@extends('layouts.master')

@section('content')
    <form action="{{ route('faculties.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="faculty_name" class="control-label">Name</label>
            <input type="text" class="form-control" name="faculty_name" placeholder="Enter Faculty Name">
        </div>

        <div class="form-group">
            <label for="description" class="control-label">Description</label>
            <input type="text" class="form-control" name="faculty_desc" placeholder="Enter Description">
        </div>
        <div class="form-group">
            <label for="description" class="control-label">Active Status</label>
            <select name="active_fg" class="form-control">
                <option value="1" selected>Active</option>
                <option value="0" >Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-info float-left">Submit</button>

    </form>
    <a href="{{ url('/faculties') }}"><button class="btn btn-default ml-2">Back</button></a>

@endsection