@extends('layouts.app')

@section('title', 'Logout')

@section('content')

<div class="container text-center py-5">
  <h3>You have been logged out successfully.</h3>
  <a href="{{ route('login') }}" class="btn btn-primary mt-3">Login Again</a>
</div>

@endsection
