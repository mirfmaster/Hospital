@extends('layouts.admin')

@section('content')
<div class="col-md-4 center-margin">
    @if(isset($data))
    <form class="form-horizontal form-label-left" method="POST" action="{{route('drug.update',$data->drug_id)}}">
    @method('PUT')
    @else
    <form class="form-horizontal form-label-left" method="POST" action="{{route('drug.store')}}">
    @endif
        @csrf
        <div class="form-group">
            <label>Drug Name</label>
            <input type="text" name="drug_name" class="form-control" placeholder="Drugs Name" value=
                "{{isset($data) ? $data->drug_name:null}}"
            >
        </div>
        <div class="form-group">
            <label>Stocks</label>
            <input type="number" name="stocks" class="form-control" placeholder="Stocks" value=
                "{{isset($data) ? $data->stocks:null}}"
            >
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value=
                "{{isset($data) ? $data->price:null}}"
            >
        </div>
            <input type="submit" class="btn btn-primary center-margin" value="Submit"/>
            <input type="reset" class="btn btn-warning" value="Reset"/>
    </form>
</div>
@endsection