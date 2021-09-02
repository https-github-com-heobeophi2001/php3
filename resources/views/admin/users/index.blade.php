@extends('layout')

@section('title', 'Quản lý user')

@section('contents')
    @if (!empty($data))
        <div>
            <form action="{{ route('admin.users.index') }}" method="GET" class="row col-6">
                <div class="col-10">
                    <input class="form-control col-4" type="text" name="keyword" value="{{ old('keyword') }}" />
                    <button class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form> 
        </div>
        <table class="table">

            <a class="btn btn-success" href="{{route('admin.users.create')}}">Thêm user</a>
            <thead class="table-dark">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Invoice No.</td>
                    <td>Gender</td>
                    <td>Role</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', ['user' => $user->id]) }}" class="text-decoration-none">
                                {{ $user->name }}
                            </a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->invoices->count() }}</td>
                        <td>{{ $user->gender == config('common.user.gender.male') ? 'Nam' : 'Nữ' }}</td>
                        <td>{{ $user->role == config('common.user.role.user') ? 'User' : 'Admin' }}</td>
                        <td>
                            <a class="btn btn-primary"
                                href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Update</a>
                           
                            </td>
                        <td>
                            <a class="btn btn-danger" href="{{route('admin.users.delete', ['user'=>$user->id])}}" onClick="return confirm('Xác nhận xóa user này')">Delete</a>
                        </td>
                        {{-- <td>
                            <button class="btn btn-danger" role="button" data-toggle="modal"
                                data-target="#confirm_delete_{{ $user->id }}">Delete</button>
                            <div class="modal fade" id="confirm_delete_{{ $user->id }}" tabindex="-1" role="dialog">
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
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Cancel</button>
                                            <form method="POST"
                                                action="{{ route('admin.users.delete', ['user' => $user->id]) }}">
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
        <h2>Không có dữ liệu</h2>
    @endif
@endsection
@push('script')
    <script>
        $("#form_create").on('submit', function(event) {
            event.preventDefault();
            const url = "{{ route('admin.users.store') }}";
            let name = $("#form_create input[name='name']").val();
            let email = $("#form_create input[name='email']").val();
            let address = $("#form_create input[name='address']").val();
            let password = $("#form_create input[name='password']").val();
            let gender = $("#form_create select[name='gender']").val();
            let role = $("#form_create select[name='role']").val();
            let _token = $("#form_create input[name='_token']").val();
            const data = {
                // _token,
                name,
                email,
                address,
                password,
                gender,
                role
            };
            fetch(url, {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    "X-CSRF-Token": _token,
                    "Content-Type": "application/json",
                    "Accpect": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(response => response.json()).then(data => {
                console.log(data);
                if (data.status == 200) {
                    window.location.reload();
                }
            })
        })
    </script>
@endpush