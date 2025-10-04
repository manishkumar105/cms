@extends("layouts.app")

@section("title","Deleted Posts")

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
                <h3 class="text-center mb-4">Deleted Posts</h3>
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
                        @forelse($deletedPosts as $post)
                        <tr>
                            
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->user->name ?? 'N/A' }}</td>
                            <td>
                                

                                @can("restore",$post)
                                <form action="{{ route('posts.restoreSoftDelete',$post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("PUT")
                                    <button class="btn btn-sm btn-success" onclick="return confirm('Are you sure?')">Restore</button>
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
                    {{ $deletedPosts->links('pagination::bootstrap-5') }}
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
