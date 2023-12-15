@auth
    <h4>{{ __('post.share_ideas') }}</h4>

    <div class="row">
        <form action="{{ route('posts.create') }}" method="get">
            @csrf
            @error('content')
                <span class="fs-6 text-danger py-2">{{ $message }}</span>
            @enderror
            <div class="mb-3 mt-2">
                <textarea class="form-control" placeholder="...." id="idea" name="content" rows="3" required></textarea>
            </div>

            <div class="">
                <button type="submit" class="btn btn-sm btn-dark">{{ __('post.share') }}</button>
            </div>
        </form>
    </div>
@endauth

@guest

    <h4 class="my-3">{{ __('post.login_to_share') }}<span class="text-danger">{{ __('post.login') }}!</span></h4>

@endguest
