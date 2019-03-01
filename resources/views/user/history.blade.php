@extends('user.container')

@section('content')
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead >
        <tr>
            <th>No</th>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Diagnosis Result</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @php ($no=1)
        @forelse($data->user as $patient)
        {{dd($patient->email)}}
        {{$patient->user->diagnose}}
            <tr>
                <td class="text-center">{{$no++}}</td>
                <td class="text-center">{{$data->name}}</td>
                <td class="text-center">{{$data->name}}</td>
                <td class="text-center">{{$patient->diagnose}}</td>
            </tr>
        @empty
            <tr><td colspan="8"> Sorry we dont found data yet.</td></tr>
        @endforelse
        
    </tbody>
    
</table>
@endsection