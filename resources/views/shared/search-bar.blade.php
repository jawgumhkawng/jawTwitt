<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">Search</h5>
    </div>

    <form action="{{ route('dashboard') }}" method="get">
        @csrf
        <div class="card-body">
            <input placeholder="...
      " class="form-control w-100" type="text" name="search" id="search" />
            <button class="btn btn-dark btn-sm mt-2">Search</button>
        </div>
    </form>
</div>
