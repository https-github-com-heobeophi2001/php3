@extends('layout')
@section('title','Thêm danh mục')

@section('contents')
<form action="{{route('admin.categories.store')}}" method="post">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name">
    </div>

    <button class="mt-3 btn btn-primary">ADD CATEGORY</button>
</form>
@endsection