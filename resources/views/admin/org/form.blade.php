@extends('layouts.admin')

@section('content')
<div class="col-md-4 center-margin">
    @if(isset($data))
    <form class="form-horizontal form-label-left" method="POST" action="{{route('user.update',$data->id)}}">
        @method('PUT')
        @else
        <form class="form-horizontal form-label-left" method="POST" action="{{route('user.store')}}">
            @endif
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{isset($data) ? $data->name:null}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{isset($data) ? $data->email:null}}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" cols="30" rows="10" class="form-control">{{isset($data) ? $data->address:null}}</textarea>
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="City" name="city" class="form-control" placeholder="City" value="{{isset($data) ? $data->city:null}}">
            </div>
            <div class="form-group">
                <label>Sex</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sex" value="Male" checked>
                    <label class="form-check-label">
                        Male
                    </label>
                    <input class="form-check-input" type="radio" name="sex" value="Female" {{ isset($data->sex) ? (($data->sex==='Female') ? 'checked':null) : null }}>
                    <label class="form-check-label">
                        Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Salary</label>
                <input type="Salary" name="salary" class="form-control" placeholder="Salary" value="{{isset($data) ? $data->salary:null}}">
            </div>
            <label>Experience</label>
            <div class="input-group">
                <input type="number" name="experience" class="form-control" placeholder="Experience" value="{{isset($data) ? $data->experience:null}}">
                <span class="input-group-addon">Years</span>
            </div>
            <div class="form-group">
                <label>Contact</label>
                <input type="Contact" name="contact" class="form-control" placeholder="Contact" value="{{isset($data) ? $data->contact:null}}">
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control">
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary center-margin" value="Submit" />
            <input type="reset" class="btn btn-warning" value="Reset" />
        </form>
</div>
@endsection 