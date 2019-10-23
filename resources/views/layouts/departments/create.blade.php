@extends('layouts.master')

@section('content')
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="dept_name" class="control-label">Name</label>
            <input type="text" class="form-control" name="dept_name" placeholder="Enter Department Name">
        </div>

        <div class="form-group">
            <label for="description" class="control-label">Faculty</label>
            <select name="faculty_id" class="form-control">
                <option value="">Select One</option>
                @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}" >{{ $faculty->faculty_name }}</option>
                @endforeach
            </select>
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
    <a href="{{ url('/departments') }}"><button class="btn btn-default ml-2">Back</button></a>

@endsection