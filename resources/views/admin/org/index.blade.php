@extends('layouts.admin')

@section('content')
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead >
        <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Act</th>
        </tr>
    </thead>
    <tbody>
        @php ($no=1)
        @foreach($data as $d)
        <tr>
            <td class="text-center">{{$no++}}</td>
            <td class="text-center">{{$d->user_id}}</td>
            <td class="text-center">{{$d->email}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->role}}</td>
            <td class="text-center">{{Carbon\Carbon::parse($d->created_at)->format('j F Y')}}</td>
            <td class="text-center">{{Carbon\Carbon::parse($d->updated_at)->format('j F Y')}}</td>
            <td class="text-center align-middle">
                <a href="{{route('user.show',$d['user_id'])}}" class="btn btn-warning"> Edit</a>    
                <form action="{{route('user.destroy',$d['user_id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form> 
            </td>
        </tr>
        @endforeach
        
    </tbody>
    
</table>
{{$data->links()}}
<a href="{{route('user.create')}}" class="btn btn-primary">Add Worker</a>
@endsection