@auth
    <h4>Share yours ideas</h4>

    <div class="row">
        <form action="{{ route('post.create') }}" method="post">
            @csrf
            @error('content')
                <span class="fs-6 text-danger py-2">{{ $message }}</span>
            @enderror
            <div class="mb-3 mt-2">
                <textarea class="form-control" placeholder="...." id="idea" name="content" rows="3" required></textarea>
            </div>

            <div class="">
                <button type="submit" class="btn btn-sm btn-dark">Share</button>
            </div>
        </form>
    </div>
@endauth

@guest

    <h4 class="my-3">Share yours ideas for <span class="text-danger">Login!</span></h4>

@endguest
