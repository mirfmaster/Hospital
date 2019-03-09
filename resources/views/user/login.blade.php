@extends('user.container')

@section('content')
<form method="POST" action="{{route('login')}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" placeholder="Enter Username" name="username">
        <small class="form-text text-muted">We'll never share your Username with anyone else.</small>
        @if ($errors->has('username'))
        <small style="color:red">Sorry to say, but username not found.</small>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
        @if ($errors->has('password'))
        <small style="color:red">Whoops, your password could be have some typos.</small>
        @endif
    </div>
    <div class="form-group">
        <input type="checkbox" id="exampleCheck1" name="remember">
        <label>Can we remember you ?</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection 