@extends('layouts.admin')

@section('content')
<div class="col-md-4 center-margin">
    @if(isset($data))
    <form class="form-horizontal form-label-left" method="POST" action="{{route('user.update',$data->user_id)}}">
    @method('PUT')
    @else
    <form class="form-horizontal form-label-left" method="POST" action="{{route('user.store')}}">
    @endif
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value=
                "{{isset($data) ? $data->name:null}}"
            >
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" placeholder="Address" value=
                "{{isset($data) ? $data->address:null}}"
            >
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value=
                "{{isset($data) ? $data->email:null}}"
            >
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="Manager">Manager</option>
                <option value="Doctor">Doctor</option>
                <option value="Staff">Staff</option>
            </select>
        </div>
            <input type="submit" class="btn btn-primary center-margin" value="Submit"/>
            <input type="reset" class="btn btn-warning" value="Reset"/>
    </form>
</div>
@endsection