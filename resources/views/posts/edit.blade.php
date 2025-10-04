@extends("layouts.app")

@section("title","Create Post")

@section("content")

<x-navbar/>


<div class="container-fluid mt-4 min-vh-100 d-flex justify-content-center align-items-start">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm p-4">
                <h2 class="text-center mb-4">Edit Post</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('posts.update',$post)}}" method="POST">
                    @method("PUT")
                    @csrf         
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title',$post->title) }}">
                    </div>        
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{ old('description',$post->description) }}"/>
                    </div>   

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
