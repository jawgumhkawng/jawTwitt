<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                {{-- @if ($editing ?? false)
                    <input type="file" name="image" class="form-control" id=""><br>
                @else --}}
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                {{-- @endif --}}
                <div>
                    @if ($editing ?? false)
                        <div class="mb-2">
                            <input type="text" name="name" class="form-control" id="">
                        </div>
                    @else
                        <h3 class="card-title mb-0">
                            <a href="#">
                                {{ $user->name }}
                            </a>
                        </h3>
                    @endif
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            @auth
                @if (auth()->id() === $user->id)
                    <div class="">
                        <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                    </div>
                @endif
            @endauth
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            @if ($editing ?? false)
                <div class="mb-3">
                    <textarea type="text" name="bio" class="form-control" id=""></textarea>
                </div>

                <button type="" class="btn btn-sm btn-dark mb-3 p-0 px-2">save</button>
            @else
                <p class="fs-6 fw-light">
                    This book is a treatise on the theory of ethics, very popular during the
                    Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                    from a line in section 1.10.32.
                </p>
            @endif
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 120 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span>{{ $user->post()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comment()->count() }} </a>
            </div>
            @auth
                @if (auth()->id() !== $user->id)
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm"> Follow </button>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
