@extends("layouts.app")

@section("title","My Profile")

@section("content")

<x-navbar/>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-sm p-4">
                    <h2 class="text-center mb-4">My Profile</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('profiles.update',$profiles->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name',$profiles->name) }}">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email',$profiles->email) }}" disabled>
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label class="form-label d-block">Gender:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="male" {{ old('gender',$profiles->gender) == 'male' ? 'checked' : '' }}>
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="female" {{ old('gender',$profiles->gender) == 'female' ? 'checked' : '' }}>
                                <label class="form-check-label">Female</label>
                            </div>
                        </div>

                        <!-- State -->
                        <div class="mb-3">
                            <label for="state" class="form-label">Choose a state:</label>
                            <select id="state" name="state" class="form-select">
                                <option value="jharkhand" {{ old('state',$profiles->state) == 'jharkhand' ? 'selected' : '' }}>Jharkhand</option>
                                <option value="west_bengal" {{ old('state',$profiles->state) == 'west_bengal' ? 'selected' : '' }}>West Bengal</option>
                                <option value="bihar" {{ old('state',$profiles->state) == 'bihar' ? 'selected' : '' }}>Bihar</option>
                                <option value="odisha" {{ old('state',$profiles->state) == 'odisha' ? 'selected' : '' }}>Odisha</option>
                            </select>
                        </div>

                        <!-- City -->
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter City" value="{{ old('city',$profiles->city) }}">
                        </div>

                        <!-- Hobbies -->
                        @php
                        $hobbies = old("hobbies",json_decode($profiles->hobbies,true) ?? []);
                        @endphp
                        <div class="mb-3">
                            <label class="form-label d-block">Select Hobbies:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]" value="cricket" {{in_array("cricket",$hobbies) == "cricket" ? "checked" : "" }}>
                                <label class="form-check-label">Cricket</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]" value="music" {{in_array("music",$hobbies) == "music" ? "checked" : "" }}>
                                <label class="form-check-label">Music</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobbies[]" value="dance" {{ in_array("dance",$hobbies) == "dance" ? "checked" : "" }}>
                                <label class="form-check-label">Dance</label>
                            </div>
                        </div>

                        <!-- Profile Image -->
                        <img src="{{asset("storage/".$profiles->image)}}" width="100" height="100"/>

                        <div class="mb-3">
                            <label class="form-label">Profile Image Upload</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>

 

@endsection