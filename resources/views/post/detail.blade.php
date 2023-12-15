@extends('layout.layout')

@section('title', 'View Post')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-lg-3">
                @include('shared.left-sidebar')
            </div>
            <div class="col-12 col-lg-6">
                <div class="mt-3">

                    @include('shared.success-message')

                    {{-- @include('shared.post-card') --}}

                    {{-- card --}}

                    <div class="card">
                        <div class="px-3 pt-4 pb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img style="width: 50px;height:50px" class="me-2 avatar-sm rounded-circle"
                                        src="{{ $post->user->getImageURL() }}" alt="Mario Avatar" />
                                    <div>
                                        <h5 class="card-title mb-0"><a href="{{ route('user.show', $post->user->id) }}">
                                                {{ $post->user->name }}</a></h5>
                                    </div>
                                </div>
                                <div>
                                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        @if (Request::segment(1) == 'posts')
                                            <a href="/"
                                                class="px-3 {{ Request::segment(3) == 'edit' ? 'd-none' : '' }}">{{ __('post.back') }}</a>
                                            @can('post-delete', $post)
                                                <a href="{{ route('posts.edit', $post) }}"
                                                    class="{{ Request::segment(3) == 'edit' ? 'd-none' : '' }}">{{ __('post.edit') }}</a>
                                            @endcan
                                        @else
                                            <a href="{{ route('posts.show', $post) }}"
                                                class="">{{ __('post.view') }}</a>
                                        @endif
                                        @can('post-delete', $post)
                                            <button class="ms-3 btn btn-danger btn-sm p-0 px-2"
                                                onclick="return confirm('Are you sure, you want to DELETE this post?')">x</button>
                                        @endcan
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($editing ?? false)
                                <form action="{{ route('posts.update', $post) }}" method="post">
                                    @csrf
                                    @method('put')
                                    @error('content')
                                        <span class="fs-6 text-danger py-2">{{ $message }}</span>
                                    @enderror
                                    <div class="mb-3 mt-2">
                                        <textarea class="form-control" placeholder="...." id="idea" name="content" rows="3">{{ $post->content }}</textarea>
                                    </div>

                                    <div class="">
                                        <button type="submit"
                                            class="btn btn-dark btn-sm me-3">{{ __('post.update') }}</button>
                                        <a href="{{ route('posts.show', $post) }}">{{ _('post.back') }}</a>
                                    </div>
                                </form>
                            @else
                                <p class="fs-6 fw-light text-muted">
                                    {{ $post->content }}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <a href="#" class="fw-light nav-link fs-6">
                                            <span class="fas fa-heart text-danger me-1"> </span>
                                            {{ $post->like()->count() }}
                                        </a>
                                        <a href="#" class="fw-light nav-link fs-6 mx-2">
                                            <span class="fas fa-comment "></span>
                                            {{ $post->comments()->count() }}
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

                                {{-- @include('shared.comment-box') --}}
                                {{-- comment --}}
                                <div>
                                    <form action="{{ route('posts.comments.store', $post) }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <textarea name="content" class="fs-6 form-control" rows="1" required></textarea>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="btn btn-primary btn-sm">{{ __('post.comment') }}</button>
                                        </div>

                                    </form>

                                    <hr />
                                    @forelse ($post->comments as $comment)
                                        <div class="d-flex align-items-start">
                                            <img style="width: 35px" class="me-2 avatar-sm rounded-circle"
                                                src="{{ $comment->user->getImageURL() }}" alt="Luigi Avatar" />
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between mt-2">
                                                    <h6 class="">{{ $comment->user->name }}</h6>
                                                    <small class="fs-6 fw-light text-muted">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </small>
                                                </div>
                                                {{-- <div class="d-flex align-items-center justify-content-between"> --}}

                                                <p class="fs-6 mt-3 fw-light">
                                                    - {{ $comment->content }}
                                                </p>
                                                {{-- <form action="{{ url('posts/comments/delete', $comment, $post) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete') --}}
                                                {{-- <button class="ms-3 btn  btn-danger btn-sm p-0 px-1 "
                                                            onclick="return confirm('Are you sure, you want to DELETE this post?')">x</button> --}}
                                                {{-- </form> --}}
                                                {{-- </div> --}}
                                            </div>

                                        </div>

                                    @empty
                                        <div class="my-3">
                                            <h4>There is no comment, yet!</h4>
                                        </div>
                                    @endforelse
                                </div>

                                {{-- comment --}}
                            @endif

                        </div>
                    </div>

                    {{-- card --}}

                </div>
            </div>
            <div class="col-12 col-lg-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection
