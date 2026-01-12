@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
@include('layouts.header')

<div class="container py-5">
    <h3>Forgot Password</h3>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Email Address</label>
            <input type="email" name="Email" class="form-control" required>
        </div>
        <button class="btn btn-primary">Send Reset Link</button>
    </form>
</div>

@include('layouts.footer')
@endsection
