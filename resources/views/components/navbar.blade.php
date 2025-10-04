<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('auth.dashboard')}}">CMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Left-aligned links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"  href="{{route('posts.create')}}">Create Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('posts.index')}}">View Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('posts.deletedpost')}}">Deleted Post</a>
        </li>
        
      </ul>

      <!-- Right-aligned dropdown -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" 
             data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <!-- dropdown-menu-end pushes menu to the right -->
            {{-- <a class="dropdown-item" href="{{ auth()->check() ? route('profiles.index', auth()->user()->id) : route('auth.showLogin') }}">
                My Profile
            </a> --}}
            <li>
                <a class="dropdown-item" href="{{route('profiles.index',auth()->user()->id)}}">My Profile</a>
            </li>
           
            
            <li>
                <a class="dropdown-item" href="{{route('profiles.edit',auth()->user()->id)}}">Edit Profile</a>
            </li>
            
             <li>
                <form action="{{route('auth.logout')}}" method="POST">
                    @csrf
                <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
