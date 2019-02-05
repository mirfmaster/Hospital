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
            <th>Drug ID</th>
            <th>Drug Name</th>
            <th>Stocks</th>
            <th>Price</th>
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
            <td class="text-center">{{$d['drug_id']}}</td>
            <td>{{$d['drug_name']}}</td>
            <td class="text-center">{{$d['stocks']}}</td>
            <td class="text-center">@rp($d['price'])</td>
            <td class="text-center">{{Carbon\Carbon::parse($d->created_at)->format('j F Y')}}</td>
            <td class="text-center">{{Carbon\Carbon::parse($d->updated_at)->format('j F Y')}}</td>
            <td class="text-center align-middle">
                <form action="{{route('drug.trashed',$d['drug_id'])}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="submit" class="btn btn-info" value="Restore">
                </form> 
                <form action="{{route('drug.trashed',$d['drug_id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Force Delete">
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="8"> Sorry we dont found data yet.</td></tr>
        @endforelse
        
    </tbody>
    
</table>
{{$data->links()}}
<a href="{{route('drug.create')}}" class="btn btn-primary">Add Data</a>
@endsection

