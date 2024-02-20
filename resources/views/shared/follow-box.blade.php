@auth
    <div class="card mt-3">
        <div class="card-header pb-0 border-0">
            <h5 class="">{{ __('post.wtfollow') }}</h5>
        </div>

        <div class="card-body">

            @foreach ($topUsers as $user)
                <div class="hstack gap-2 mb-3">
                    <div class="avatar">
                        <a href="{{ route('user.show', $user->id) }}"><img style="width: 35px ; height: 35px"
                                class="avatar-img rounded-circle" src="{{ $user->getImageURL() }}" alt="" /></a>
                    </div>
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                        <p class="mb-0 small text-truncate">{{ $user->email }}</p>
                    </div>
                    @if (auth()->user()->follow($user))
                        <a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                            href="{{ route('user.show', $user->id) }}">
                            <i class="fa-solid text-success fa-user-group"></i>
                        </a>
                    @elseif(auth()->id() === $user->id)
                        <a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                            href="{{ route('user.show', $user->id) }}">
                            <i class="fa-solid text-secondary fa-user"></i>
                        </a>
                    @else
                        <a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                            href="{{ route('user.show', $user->id) }}"><i class="fa-solid text-danger fa-plus">
                            </i>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endauth
