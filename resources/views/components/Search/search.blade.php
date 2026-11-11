<form action="{{ $route }}" method="GET" class="w-75 mb-4 mx-auto">
    <div class="input-group input-group-lg shadow-sm rounded-3 overflow-hidden">
        <span class="input-group-text bg-white border-end-0 text-muted ps-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </span>
        <input type="text" name="search" class="form-control border-start-0 border-end-0 ps-2 shadow-none fs-6"
            placeholder="Search patients, medical records..." value="{{ request()->query('search') }}">
        <button class="btn btn-primary px-4" type="submit">Search</button>
    </div>
</form>
