@extends('layout')
@section('title', 'Quản lý danh mục')
@section('contents')
@if(!empty($data))
<table class="table table-success">
    <a class="btn btn-success" href="{{route('admin.categories.add')}}">Thêm danh mục</a>
    <thead class="table-dark">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Product No.</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->products->count()}}</td>
            <td>
                <a class="btn btn-primary" href=" {{ route('admin.categories.edit', ['id'=>$item->id])}}">Update</a>
            </td>
            <td>
                <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id }}">Delete</button>

                <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Xác nhận xóa bản ghi này?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                <form method="POST" action="{{ route('admin.categories.delete', [ 'id' => $item->id ]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h2>Not Found</h2>
@endif
@endsection