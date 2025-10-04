@extends("layouts.app")

@section("title","Registration")

@section("content")

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4 w-50">
        <h2 class="text-center mb-4">Registration Form</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{route('auth.registration')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}"/>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}"/>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Confirm Password"/>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male" {{old('gender') == "male" ? "checked" : "" }}/>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female" {{old('gender') == "female" ? "checked" : "" }}/>
                    <label class="form-check-label">Female</label>
                </div>
            {{-- </div>{{ dd(old('gender')) }} --}}


            <div class="mb-3">
                <label for="state" class="form-label">Choose a state:</label>
                <select id="state" name="state" class="form-select">
                    <option value="jharkhand" {{old('state') == "jharkhand" ? "selected" : "" }}>Jharkhand</option>
                    <option value="west_bengal" {{old('state') == "west_bengal" ? "selected" : "" }}>West Bengal</option>
                    <option value="bihar" {{old('state') == "bihar" ? "selected" : "" }}>Bihar</option>
                    <option value="odisha" {{old('state') == "odisha" ? "selected" : "" }}>Odisha</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" placeholder="Enter City" value="{{old('city')}}"/>
            </div>

            <div class="mb-3">
                <label class="form-label">Select Hobbies:</label><br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="hobbies[]" value="cricket" {{ (is_array(old('hobbies')) && in_array('cricket', old('hobbies'))) ? 'checked' : '' }}/>
                    <label class="form-check-label">Cricket</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="hobbies[]" value="music" {{ (is_array(old('hobbies')) && in_array('music', old('hobbies'))) ? 'checked' : '' }}/>
                    <label class="form-check-label">Music</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="hobbies[]" value="dance" {{ (is_array(old('hobbies')) && in_array('dance', old('hobbies'))) ? 'checked' : '' }}/>
                    <label class="form-check-label">Dance</label>
                </div>
            </div>
            {{-- @if(isset($user) && $user->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$user->image) }}" alt="Profile Image" width="100" class="img-thumbnail">
                </div>
            @endif --}}
            <div class="mb-3">
                <label class="form-label">Profile Image Upload</label>
                <input type="file" name="image" class="form-control" accept="image/*" />
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Sign up</button>
            </div>

        </form>
        <div class="mb-3">
                <label class="form-label">Already have account?</label>
                <a href="{{route('auth.showLogin')}}">Sign In</a>
        </div>
    </div>
</div>

@endsection
