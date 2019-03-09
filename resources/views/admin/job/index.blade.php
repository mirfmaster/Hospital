@extends('layouts.admin')


@section('content')
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
        @forelse($data as $d)
        <tr>
            <td class="text-center">{{$no++}}</td>
            <td class="text-center">{{$d['job_id']}}</td>
            <td>{{$d['job_name']}}</td>
            <td style="max-width:45rem">{{$d['job_desc']}}</td>
            <td class="text-center align-middle">
                <a href="{{route('job.show',$d['job_id'])}}" class="btn btn-warning"> Edit</a>    
                <form action="{{route('job.destroy',$d['job_id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form> 
            </td>
        </tr>
        @empty
        <tr><td colspan="5"> Sorry we dont found data yet.</td></tr>
        @endforelse
        
    </tbody>
    
</table>
{{$data->links()}}
<a href="{{route('job.create')}}" class="btn btn-primary">Add Job Specification</a>
@endsection