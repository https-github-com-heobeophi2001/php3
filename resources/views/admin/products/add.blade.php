@extends('layout')
@section('title','Thêm sản phẩm')

@section('contents')
<form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name">
</div>
    <div>
        <label>Image</label>
        <input class="mt-3 form-control" type="file" name="image">
    </div>
    <div>
        <label>Price</label>
        <input class="mt-3 form-control" type="number" name="price">
    </div>
    <div>
        <label>Quantity</label>
        <input class="mt-3 form-control" type="number" name="quantity">
    </div>
    <div>
    <label>Category Name</label>
    <select name="category_id" class="mt-3 form-control">
        @foreach($lstCate as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    </div>
    

    <button class="mt-3 btn btn-primary">ADD PRODUCT</button>
</form>
@endsection