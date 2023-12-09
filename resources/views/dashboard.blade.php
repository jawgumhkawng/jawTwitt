@extends('layout.layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-lg-3">

                @include('shared.left-sidebar')

            </div>
            <div class="col-12 col-lg-6">

                @include('shared.success-message')

                @include('shared.error-message')

                @include('shared.post-submit')

                <hr />

                @forelse($posts as $post)
                    <div class="mt-3">

                        @include('shared.post-card')

                    </div>
                @empty
                    <div class="py-3">
                        <h6>There is no post, yet!</h6>
                    </div>
                @endforelse
                <div class="mt-3">
                    {{ $posts->links() }}
                </div>
            </div>
            <div class="col-12 col-lg-3">

                @include('shared.search-bar')
                @include('shared.follow-box')

            </div>
        </div>
    </div>
@endsection
