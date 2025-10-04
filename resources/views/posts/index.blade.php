@extends("layouts.app")

@section("title","All Posts")

@section("content")

<x-navbar/>

<div class="container-fluid mt-4 min-vh-100">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            
            <!-- Posts Table -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                
                </div>
            @endif
            <div class="card shadow-sm p-4">
                <h3 class="text-center mb-4">All Posts</h3>
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>                            
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created By</th>
                            <th>Actions</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                        <tr>
                            
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->user->name ?? 'N/A' }}</td>
                            <td>
                                @can("edit",$post)
                                <a href="{{ route('posts.edit',$post) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan

                                @can("delete",$post)
                                <form action="{{ route('posts.destroy',$post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No posts found</td>
                        </tr>
                        @endforelse
                    </tbody>
                    
                </table>
               <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $posts->links('pagination::bootstrap-5') }}
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
