<div class="card overflow-hidden" style="position: sticky; top:65px; ">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-primary rounded-1' : '' }}"
                    href="{{ route('dashboard') }}"> <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'posts' ? 'text-white bg-primary rounded-1' : '' }}"
                    href="#">
                    <span>Explore</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary rounded-1' : '' }}"
                    href="{{ route('feed') }}"> <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary rounded-1' : '' }}"
                    href="{{ route('terms') }}">
                    <span>Terms</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <span>Support</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <span>Settings</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link  {{ Route::is('profile') ? 'text-white bg-primary rounded-1' : '' }}"
            href="{{ route('user.show', auth()->user()->id ?? '') }}">View Profile </a>
    </div>
</div>
