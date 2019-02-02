@extends('layouts.admin')


@section('content')
    @if(isset($type))
        @component('components.alert',$type)
            @slot('content')
                Whoots
            @endslot
        @endcomponent
    @endif
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead >
        <tr>
            <th>No</th>
            <th>Job ID</th>
            <th>Job Name</th>
            <th>Job Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php ($no=1)
        @foreach($data as $d)
        <tr>
            <td class="text-center">{{$no++}}</td>
            <td class="text-center">{{$d['job_id']}}</td>
            <td>{{$d['job_name']}}</td>
            <td style="max-width:45rem">{{$d['job_desc']}}</td>
            <td class="text-center align-middle">
                <!-- <a href="{{route('job.trashed',$d['job_id'])}}" class="btn btn-info"> Restore</a>     -->
                <form action="{{route('job.trashed',$d['job_id'])}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="submit" class="btn btn-info" value="Restore">
                </form> 
                <form action="{{route('job.trashed',$d['job_id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Force Delete">
                </form> 
            </td>
        </tr>
        @endforeach
        
    </tbody>
    
</table>
{{$data->links()}}
<a href="{{route('job.create')}}" class="btn btn-primary">Add Job Specification</a>
@endsection