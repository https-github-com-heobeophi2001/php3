@extends('layout')
@section('contents')
<div class="container">
    <div class="col-10 offset-1 mt-4">
        @if( session()->has('error') === true )
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif  
        <form
            method="POST"
            action="{{ route('auth.login') }}">
            @csrf
            <div class="row mt-3">
                <label>Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="row mt-3">
                <label>Password</label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mt-4 mb-5">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection