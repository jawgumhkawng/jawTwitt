<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">

                <img style="width:150px; border:2px solid grey" class="me-3 avatar-sm rounded-circle  shadow"
                    src="{{ $user->getImageURL() }}" alt="Mario Avatar">

                <div>

                    <h3 class="card-title mb-0">
                        <a href="#">
                            {{ $user->name }}
                        </a>
                    </h3>

                    <span class="fs-6 text-muted">{{ $user->email }}</span>

                </div>
            </div>

            @can('update', $user)
                <div class="">
                    <a href="{{ route('user.edit', $user->id) }}">{{ __('post.edit') }}</a>
                </div>
            @endcan

        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> {{ __('post.bio') }} : </h5>

            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>

            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $user->follower()->count() }} : {{ __('post.follower') }} </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span>{{ $user->post()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comment()->count() }} </a>
            </div>
            @auth
                {{-- @if (auth()->id() !== $user->id) --}}
                @if (Auth::user()->isNot($user))
                    @if (auth()->user()->follow($user))
                        <form action="{{ route('user.unfollow', $user->id) }}" method="post">
                            @csrf
                            <div class="mt-3">
                                <button class="btn btn-danger btn-sm p-0 px-2"> {{ __('post.unfollow') }} </button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('user.follow', $user->id) }}" method="post">
                            @csrf
                            <div class="mt-3">
                                <button class="btn btn-primary btn-sm p-0 px-2"> {{ __('post.follow') }} </button>
                            </div>
                        </form>
                    @endif
                @endif
            @endauth
        </div>
    </div>
</div>
