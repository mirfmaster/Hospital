@extends('layouts.admin')


@section('content')
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead >
        <tr>
            <th>No</th>
            <th>Patient Name</th>
            <th>Phone's Patient</th>
            <th>Adress Patient</th>
            <th>Doctor Name</th>
            <th>Diagnosis Result</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @php ($no=1)
        @forelse($data as $d)
            @foreach($d->patients as $patient)
            <tr>
                <td class="text-center">{{$no++}}</td>
                <td class="text-center">{{$patient->name}}</td>
                <td class="text-center">{{$patient->phone}}</td>
                <td class="text-center">{{$patient->address}}</td>
                <td class="text-center">{{$d->name}}</td>
                <td class="text-center">{{$patient->pivot->diagnose}}</td>
                <td class="text-center">{{Carbon\Carbon::parse($patient->pivot->created_at)->format('j F Y')}}</td>
                <td class="text-center">{{Carbon\Carbon::parse($patient->pivot->updated_at)->format('j F Y')}}</td>
            </tr>
            @endforeach

        @empty
            <tr><td colspan="8"> Sorry we dont found data yet.</td></tr>
        @endforelse
        
    </tbody>
    
</table>
{{$data->links()}}
<a href="{{route('diagnosis.create')}}" class="btn btn-primary">Add Data</a>
@endsection