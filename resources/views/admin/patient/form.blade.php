@extends('layouts.admin')

@section('content')
<div class="col-md-4 center-margin">
    @if(isset($data))
    <form class="form-horizontal form-label-left" method="POST" action="{{route('patient.update',$data->id)}}">
    @method('PUT')
    @else
    <form class="form-horizontal form-label-left" method="POST" action="{{route('patient.store')}}">
    @endif
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Drugs Name" value=
                "{{isset($data) ? $data->name:null}}"
            >
        </div>
        <div class="form-group">
            <label>User Name</label>
            <input type="text" name="username" class="form-control" placeholder="User Name" value=
                "{{isset($data) ? $data->name:null}}"
            >
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="birth_date" class="form-control" value=
                "{{isset($data) ? $data->birth_date:null}}"
            >
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" placeholder="Address" value=
                "{{isset($data) ? $data->address:null}}"
            >
        </div>
            <input type="submit" class="btn btn-primary center-margin" value="Submit"/>
            <input type="reset" class="btn btn-warning" value="Reset"/>
    </form>
</div>
@endsection