@extends('layouts.admin')

@section('content')
<div class="col-md-4 center-margin">
        <form class="form-horizontal form-label-left" method="POST" action="{{route('job.update',$data->job_id)}}">
        @method('PUT')  
        @csrf
        <div class="form-group">
            <label>Jobs Name</label>
            <input type="text" name="job_name" class="form-control" placeholder="Jobs Name" value=
                "{{isset($data) ? $data->job_name:null}}"
            >
        </div>
        <div class="form-group">
            <label>Jobs Description</label>
            <textarea name="job_desc" cols="30" rows="10" class="form-control">{{isset($data) ? $data->job_desc:null}}</textarea>
        </div>
        <input type="submit" class="btn btn-primary align-middle" value="Add Job"/>
    </form>
</div>
@endsection