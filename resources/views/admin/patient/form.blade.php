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
            <input type="text" name="name" class="form-control" placeholder="Name" id="name" value=
                "{{isset($data) ? $data->name:null}}"
            >
        </div>
        <div class="form-group">
            <label>User Name</label>
            <input type="text" name="username" class="form-control" placeholder="User Name" id="username" value=
                "{{isset($data) ? $data->name:null}}" readonly
            >
            <div>You don't like the username? just clickin/clickout your name again.</div>
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="birth_date" class="form-control" value=
                "{{isset($data) ? $data->birth_date:null}}"
            >
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" cols="30" rows="10" class="form-control">{{isset($data) ? $data->address:null}}</textarea>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Phone" maxlength="13" value=
                "{{isset($data) ? $data->phone:null}}" onkeypress="return isNumberKey(event)"
            >
        </div>
            <input type="submit" class="btn btn-primary center-margin" value="Submit"/>
            <input type="reset" class="btn btn-warning" value="Reset"/>
    </form>
    @if(!isset($data))
        <div>This account will have <code>new patient</code> as their password.</div>
    @endif
</div>
@endsection

@push('scripts')
<script>
$('#name').on('focusout',function(e) {
    e.preventDefault(); 
    var name = $('#name').val();
    var server = window.location.origin;
    var url= server+'/admin/patient/generateUserName/'+name;
    $.ajax({
        method: "GET",
        url: url,
        success:function(name) {
            $("#username").val(name.name);
        }
    });
});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
@endpush