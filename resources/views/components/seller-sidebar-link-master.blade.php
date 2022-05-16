<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Posts</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">

        @if (auth()->user()->userHasRole('Admin'))
        <a class="collapse-item" href="{{ route('post.allpost') }}">All Posts</a>
        @endif
        <a class="collapse-item" href="{{ route('seller.posts.create') }}">Create Post</a>
        <a class="collapse-item" href="{{ route('post.index') }}">Uploaded Posts</a>
      </div>
    </div>
  </li>