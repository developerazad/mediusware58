@extends('layouts.master')

@section('content')
    <form action="{{ url('faculties/'.$faculty->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="faculty_name" class="control-label">Name</label>
            <input type="text" class="form-control" name="faculty_name" value="{{ $faculty->faculty_name }}" placeholder="Enter Faculty Name">
        </div>

        <div class="form-group">
            <label for="description" class="control-label">Description</label>
            <input type="text" class="form-control" name="faculty_desc" value="{{ $faculty->faculty_desc }}" placeholder="Enter Description">
        </div>
        <div class="form-group">
            <label for="description" class="control-label">Active Status</label>
            <select name="active_fg" class="form-control">
                <option value="1" @if($faculty->active_fg==1) selected @endif>Active</option>
                <option value="0" @if($faculty->active_fg==0) selected @endif>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-info float-left">Submit</button>

    </form>
    <a href="{{ url('/faculties') }}"><button class="btn btn-default ml-2">Back</button></a>


@endsection