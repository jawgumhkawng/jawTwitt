<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width: 50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar" />
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario </a></h5>
                </div>
            </div>
            <div>
                <form action="{{ route('post.delete', $post) }}" method="post">
                    @csrf
                    @method('delete')

                    @if (Request::segment(1) == 'post')
                        <a href="/" class="px-3 {{ Request::segment(3) == 'edit' ? 'd-none' : '' }}">back</a>
                        <a href="{{ route('post.edit', $post) }}"
                            class="{{ Request::segment(3) == 'edit' ? 'd-none' : '' }}">edit</a>
                    @else
                        <a href="{{ route('post.show', $post) }}" class="">view</a>
                    @endif
                    <button class="ms-3 btn btn-danger btn-sm p-0 px-2"
                        onclick="return confirm('Are you sure, you want to DELETE this post?')">x</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('post.update', $post) }}" method="post">
                @csrf
                @method('put')
                @error('content')
                    <span class="fs-6 text-danger py-2">{{ $message }}</span>
                @enderror
                <div class="mb-3 mt-2">
                    <textarea class="form-control" placeholder="...." id="idea" name="content" rows="3">{{ $post->content }}</textarea>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-dark btn-sm me-3">Update</button>
                    <a href="{{ route('post.show', $post) }}">back</a>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $post->content }}
            </p>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6">
                        <span class="fas fa-heart me-1"> </span>
                        {{ $post->likes }}
                    </a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted">
                        <span class="fas fa-clock"> </span>
                        {{ $post->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
            <hr>

            @include('shared.comment-box')
        @endif

    </div>
</div>
