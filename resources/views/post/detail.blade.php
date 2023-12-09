@extends('layout.layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-lg-3">
                @include('shared.left-sidebar')
            </div>
            <div class="col-12 col-lg-6">
                <div class="mt-3">

                    @include('shared.success-message')
                    @include('shared.post-card')

                </div>
            </div>
            <div class="col-12 col-lg-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection
