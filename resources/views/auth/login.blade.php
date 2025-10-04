@extends("layouts.app")

@section("title","Login Page")

@section("content")

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4 w-50">
        <h2 class="text-center mb-4">Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                
            </div>
        @endif

        <form action="{{route('auth.login')}}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}"/>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
            

        </form>
        <div class="mb-3">
                <label class="form-label">Don't have account?</label>
                <a href="{{route('auth.showRegistration')}}">Sign Up</a>
        </div>
    </div>
</div>

@endsection
