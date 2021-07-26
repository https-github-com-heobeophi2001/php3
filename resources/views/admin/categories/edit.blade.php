@extends('layout')
@section('title','Sửa danh mục')

@section('contents')
<form action="{{route('admin.categories.update', ['id'=>$data->id])}}" method="post">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{$data->name}}">
    </div>

    <button class="mt-3 btn btn-primary">Sửa danh mục</button>
</form>
@endsection