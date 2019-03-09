@extends('layouts.admin')

@section('content')
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Sex</th>
            <th>Salary</th>
            <th>Experience</th>
            <th>Specialization</th>
            <th>Contact</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Act</th>
        </tr>
    </thead>
    <tbody>
        @php ($no=1)
        @forelse($data as $d)
        <tr>
            <td class="text-center">{{$no++}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->address}}</td>
            <td>{{$d->city}}</td>
            <td>{{$d->sex}}</td>
            <td>@rp($d->salary)</td>
            <td>{{isset($d->experience) ? $d->experience." Years":"No Experiences yet."}}</td>
            <td>{{$d->specialization}}</td>
            <td>{{$d->contact}}</td>
            <td>
                @foreach($d->roles as $role)
                {{$role->name}}
                @endforeach
            </td>
            <td class="text-center">{{Carbon\Carbon::parse($d->created_at)->format('d/m/Y')}}</td>
            <td class="text-center">{{Carbon\Carbon::parse($d->updated_at)->format('d/m/Y')}}</td>
            <td class="text-center align-middle">
                <a href="{{route('user.show',$d['id'])}}" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span></a>
                <form action="{{route('user.destroy',$d['id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">No Data Found Yet.</td>
        </tr>
        @endforelse
    </tbody>

</table>
{{$data->links()}}
<a href="{{route('user.create')}}" class="btn btn-primary">Add Worker</a>
@endsection 