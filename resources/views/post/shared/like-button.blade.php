@auth
    <div>
        @if (auth()->user()->post_liked($post))
            <form action="{{ route('posts.unlike', $post->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light  nav-link fs-6">
                    <span class="fas fa-heart text-danger "></span>
                    {{ $post->like()->count() }}
                </button>
            </form>
        @else
            <form action="{{ route('posts.like', $post->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light  nav-link fs-6">
                    <span class="far fa-heart text-danger"></span>
                    {{ $post->like_count }}
                </button>
            </form>
        @endif
    </div>
@endauth

@guest
    <a href="{{ route('login') }}" class="fw-light nav-link fs-6">
        <span class="fas fa-heart "></span>
        {{ $post->like()->count() }}
    </a>
@endguest
