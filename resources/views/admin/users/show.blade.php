@extends('layout')
@section('title', 'Thông tin người dùng')
@section('contents')
<div>
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="col-6">
                <div class="col-3">Họ tên</div>
                <div class="col-8">{{$user->name}}</div>
            </div>
        </div>
    </div>
</div>
<div>
    <p>Lịch sử mua hàng</p>
    <table class="table">
        <thead>
            <tr>
                <td scope="col">#</td>
                <td scope="col">Name</td>
                <td scope="col">Number</td>
                <td scope="col">Address</td>
                <td scope="col">Price</td>
                <td scope="col">Invoice Status</td>
                <td scope="col">Create At</td>
            </tr>
        </thead>
        <tbody>
            @foreach($user->invoices as $invoice)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$invoice->number}}</td>
                <td>{{$invoice->address}}</td>
                <td>{{$invoice->total_price}}</td>
                <td>{{$invoice->status}}</td>
                <td>{{$invoice->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection