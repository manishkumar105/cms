@extends("layouts.app")

@section("title","Dashboard")


@section("content")

<x-navbar/>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
       
    </div>
@endif

<div class="container mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="text-primary">Welcome, {{ auth()->user()->name }}</h3>
        </div>
    </div>
</div>


@endsection