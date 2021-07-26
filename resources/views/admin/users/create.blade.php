@extends("layout")

@section('title', 'Thêm mới user')
@section('contents')
<form method="POST" class="mt-5"
    action="{{ route('admin.users.store') }}">
    @csrf
    <div class="mt-3">
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" />
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Email</label>
        <input class="mt-3 form-control" type="email" name="email" />
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Address</label>
        <input class="mt-3 form-control" type="text" name="address" />
        @error('address')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Password</label>
        <input class="mt-3 form-control" type="password" name="password" />
        @error('password')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Gender</label>
        <select class="mt-3 form-control" name="gender">
            <option value=""></option>
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>
    </div>
    <div class="mt-3">
        <label>Role</label>
        <select class="mt-3 form-control" name="role">
            <option value=""></option>
            <option value="0">User</option>
            <option value="1">Admin</option>
        </select>
    </div>

    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection