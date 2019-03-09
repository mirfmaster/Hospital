@extends('user.container')

@section('content')
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Doctor Name</th>
            <th>Doctor Address</th>
            <th>Doctor Contact</th>
            <th>Diagnosis Result</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Prescription</th>
        </tr>
    </thead>
    <tbody>
        @php ($no=1)
        @forelse($data->user as $user)
        <tr>
            <td class="text-center">{{$no++}}</td>
            <td class="text-center">{{$user->name}}</td>
            <td class="text-center">{{$user->address}}</td>
            <td class="text-center">{{$user->contact}}</td>
            <td class="text-center">{{$user->pivot->diagnose}}</td>
            <td class="text-center">{{$user->pivot->created_at}}</td>
            <td class="text-center">{{$user->pivot->updated_at}}</td>
            <td class="text-center">
                @foreach($prescription as $download)
                @if($user->pivot->id == $download->diagnose_id)
                <a href="{{route('prescription',$download->diagnose_id)}}" class="btn btn-info">DOWNLOAD</a>

                @endif
                @endforeach
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8"> Sorry we dont found data yet.</td>
        </tr>
        @endforelse

    </tbody>

</table>
@endsection 