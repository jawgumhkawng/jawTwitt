<div class="card overflow-hidden" style="position: sticky; top:65px; ">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-primary rounded-1' : '' }}"
                    href="{{ route('dashboard') }}"> <span>{{ __('post.home') }}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'posts' ? 'text-white bg-primary rounded-1' : '' }}"
                    href="#">
                    <span>{{ __('post.explore') }}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary rounded-1' : '' }}"
                    href="{{ route('feed') }}"> <span>{{ __('post.feed') }}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary rounded-1' : '' }}"
                    href="{{ route('terms') }}">
                    <span>{{ __('post.terms') }}</span></a>
            </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('profile') ? 'text-white bg-primary rounded-1' : '' }}"
                        href="{{ route('user.show', auth()->user()->id ?? '') }}">
                        <span>{{ __('post.viewprofile') }}</span></a>
                </li>
            @endauth
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link " href="{{ route('lang', 'en') }}">Eng</a>
        <a class="btn btn-link " href="{{ route('lang', 'ja') }}">jpn</a>
    </div>
</div>
