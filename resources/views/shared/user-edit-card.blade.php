<div class="card">
    <div class="px-3 pt-4 pb-2">

        <form action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <img style="width:150px; border:2px solid grey" class="me-3 avatar-sm rounded-circle shadow"
                        src="{{ $user->getImageURL() }}" alt="Mario Avatar">

                    <div>

                        <div class="mb-2">
                            <input type="text" name="name" class="form-control" id=""
                                value="{{ $user->name }}">
                            @error('name')
                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <span class="fs-6 text-muted">{{ $user->email }}</span>
                    </div>
                </div>
                @auth
                    @if (auth()->id() === $user->id)
                        <div class="">
                            <a href="{{ route('user.show', $user->id) }}" class="">View</a>
                        </div>
                    @endif
                @endauth
            </div>

            <div class="mt-3">
                <h5 class="fs-6" for="">Profile Photo :</h5>
                <input type="file" name="image" class="formcontrol" id="">
                @error('image')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>

                <div class="mb-3">
                    <textarea type="text" name="bio" class="form-control" id="">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm btn-dark mb-3 p-0 px-2">save</button>

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
        </form>
    </div>
</div>
