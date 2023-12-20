<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{ __('post.search') }}</h5>
    </div>

    <form action="{{ route('dashboard') }}" method="get">

        <div class="card-body">
            <input placeholder="...
      " value="{{ request('search', '') }}" class="form-control w-100" type="text"
                name="search" id="search" />
            <button class="btn btn-dark btn-sm mt-2">{{ __('post.search') }}</button>
        </div>
    </form>
</div>
