@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="transition: all 0.8s ease">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
