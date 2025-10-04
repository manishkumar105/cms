@extends('layouts.app') 

@section("title","My Profile")

@section('content')
<x-navbar/>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header text-center">
            <h2>My Profile</h2>
        </div>
        <div class="card-body">
            <!-- Profile Image -->
            @if($profiles->image)
                <div class="text-center mb-3">
                    <img src="{{ asset('storage/' . $profiles->image) }}" alt="Profile Image" class="img-thumbnail" width="150">
                </div>
            @endif

            <p><strong>Name:</strong> {{ $profiles->name }}</p>
            <p><strong>Email:</strong> {{ $profiles->email }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($profiles->gender) }}</p>
            <p><strong>State:</strong> {{ ucfirst($profiles->state) }}</p>
            <p><strong>City:</strong> {{ ucfirst($profiles->city) }}</p>

            @if($profiles->hobbies)
                <p><strong>Hobbies:</strong> 
                    {{implode(", ",json_decode($profiles->hobbies,true))}}
                </p>
            @endif
        </div>
    </div>
</div>
@endsection
