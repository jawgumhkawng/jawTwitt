@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="transition: all 0.8s ease">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
