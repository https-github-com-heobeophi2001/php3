@extends('layout')
@section('title', 'Quản lý sản phẩm')
@section('contents')
@if(!empty($data))
<div>
    <form action="{{ route('admin.products.index') }}" method="GET" class="row col-6">
        <div class="col-10">
            <input class="form-control col-4" type="text" name="keyword" value="{{ old('keyword') }}" />
            <button class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form> 
</div>
<table class="table ">
    <a class="btn btn-success" href="{{route('admin.products.add')}}">Thêm sản phẩm</a>
    <thead class="table-dark">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
            <td>Price</td>
            <td>Quantity</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $pro)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$pro->name}}</td>
            <td><img src="{{ asset('upload/' . $pro->image) }}" width="100px" height="100px"></td>
            <td>{{number_format($pro->price)}} VND</td>
            <td>{{number_format($pro->quantity)}}</td>   
            <td>
                <a class="btn btn-primary" href=" {{ route('admin.products.edit', ['id'=>$pro->id])}}">Update</a>
            </td>
            <td>
                <a class="btn btn-danger" href="{{route('admin.products.delete', ['id'=>$pro->id])}}" onClick="return confirm('Xác nhận xóa sản phẩm này')">Delete</a>
            </td>
            {{-- <td>
                <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $pro->id }}">Delete</button>

                <div class="modal fade" id="confirm_delete_{{ $pro->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Xác nhận xóa sản phẩm này
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                <form method="POST" action="{{ route('admin.products.delete', [ 'id' => $pro->id ]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h2>Not Found</h2>
@endif
{{$data->links()}}
@endsection