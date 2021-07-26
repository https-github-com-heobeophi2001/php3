@extends('layout')
@section('title','Edit Product')

@section('contents')
<form action="{{route('admin.products.update', ['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{$data->name}}">
    </div>
    <div>
        <label>Image</label>
        <input class="mt-3 form-control" type="file" name="image" value="{{$data->image}}"> <br>
        <div class="div">
            @if($data->image)
            <img src="{{asset('upload/' . $data->image)}}" width="100px" height="100px" alt="">
            @endif
        </div>
    </div>
    <div>
        <label>Price</label>
        <input class="mt-3 form-control" type="number" name="price" value="{{$data->price}}">
    </div>
    <div>
        <label>Quantity</label>
        <input class="mt-3 form-control" type="number" name="quantity" value="{{$data->quantity}}">
    </div>
    <label>Category Name</label>
    <select name="category_id" class="mt-3 form-control">
        @foreach($lstCate as $item)
        <option value="{{$item->id}}" {{$item->id == $data->category_id ? 'selected' : ''}}>{{$item->name}}</option>
        @endforeach
    </select>



    <button class="mt-3 btn btn-primary">UPDATE PRODUCT</button>
</form>
@endsection