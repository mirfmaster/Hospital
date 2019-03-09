@extends('layouts.admin')


@section('content')
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Date of birth</th>
            <th>Adress</th>
            <th>Phone</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php ($no=1)
        @forelse($data as $d)
        <tr>
            <td class="text-center">{{$no++}}</td>
            <td class="text-center">{{$d->name}}</td>
            <td class="text-center">{{$d->username}}</td>
            <td class="text-center">{{Carbon\Carbon::parse($d->birth_date)->format('j F Y')}}</td>
            <td class="text-center">{{$d->address}}</td>
            <td class="text-center">{{$d->phone}}</td>
            <td class="text-center">{{Carbon\Carbon::parse($d->created_at)->format('j F Y')}}</td>
            <td class="text-center">{{Carbon\Carbon::parse($d->updated_at)->format('j F Y')}}</td>
            <td class="text-center align-middle">
                <a href="{{route('patient.show',$d['id'])}}" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span></a>
                <form action="{{route('patient.destroy',$d['id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8"> Sorry we dont found data yet.</td>
        </tr>
        @endforelse

    </tbody>

</table>
{{$data->links()}}
<center>
    <a href="{{route('patient.create')}}" class="btn btn-primary">Add Data</a>
</center>
@endsection 