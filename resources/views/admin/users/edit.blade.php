@extends('layout')
@section('title','Update user')

@section('contents')
<form action="{{route('admin.users.update', ['id'=>$data->id])}}" method="post">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{$data->name}}">
    </div>
    <div>
        <label>Password</label>
        <input class="mt-3 form-control" type="password" name="password" value="{{$data->password}}">
    </div>
    <div>
        <label>Email</label>
        <input class="mt-3 form-control" type="text" name="email" value="{{$data->email}}">
    </div>
    <div>
        <label>Address</label>
        <input class="mt-3 form-control" type="text" name="address" value="{{$data->address}}">
    </div>
    <div>
        <label>Gender</label>
        <select name="gender" class="form-control">
            <option value="1" {{$data->gender == 1 ? "selected" : ""}} >Male</option>
            <option value="0" {{$data->gender == 0 ? "selected" : ""}} >Female</option>
        </select>
    </div>
    <div>
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="1" {{$data->role == 1 ? "selected" : ""}}>User</option>
            <option value="0" {{$data->role == 0 ? "selected" : ""}}>Admin</option>
        </select>
    </div>

    <button class="mt-3 btn btn-primary">UPDATE USER</button>
</form>
@endsection