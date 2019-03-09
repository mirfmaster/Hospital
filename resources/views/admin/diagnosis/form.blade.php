@extends('layouts.admin')

@section('content')
<div class="col-md-4 center-margin">
    @if(isset($data))
    <form class="form-horizontal form-label-left" method="POST" action="{{route('diagnosis.update',$data->id)}}">
        @method('PUT')
        @else
        <form class="form-horizontal form-label-left" method="POST" action="{{route('diagnosis.store')}}">
            @endif
            @csrf
            <div class="form-group">
                <label>Doctor Name</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Patients Name</label>
                <select name="patient_id" class="form-control">
                    @foreach($patients as $patient)
                    <option value="{{$patient->id}}" {{ isset($data) ? (
                    ($data->patient_id===$patient->patient_id) ? "selected" : null)
                :null }}>{{$patient->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Diagnose</label>
                <textarea name="diagnose" cols="30" rows="10" class="form-control">{{isset($data) ? $data->diagnose:null}}</textarea>
            </div>
            <div class="form-group">
                <input type="checkbox" name="prescription" id="add"> Medical Prescription
            </div>
            <div class="form-group" id="prescription" class="form-control" style="display:none;">
                <label>Recipe</label>
                <textarea name="medical_prescription" cols="30" class="form-control" rows="5"></textarea>
                <label>Validity Period</label>
                <input type="date" name="validity_period" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary center-margin" value="Submit" />
            <input type="reset" class="btn btn-warning" value="Reset" />
        </form>
</div>
@endsection
@push('scripts')
<script>
    $("#add").change(function() {
        $("#prescription").toggle(this.checked);
    });
</script>
@endpush 