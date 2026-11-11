<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm py-2">
    <div class="container-fluid">

        <!-- Toggle Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas"
            aria-controls="navbarOffcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas Drawer -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas" aria-labelledby="navbarOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="navbarOffcanvasLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            @auth
                <div class="offcanvas-body">
                    <!-- Right Side: Interactive User Profile Dropdown -->
                    <div class="nav-item dropdown ms-auto">
                        <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <!-- Person Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                class="bi bi-person-circle text-secondary" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>

                            <!-- User Name & Administrator Role -->
                            <div class="d-flex flex-column text-start lh-1">
                                <span class="fw-bold text-dark">
                                    {{ Auth::user()->name ?? 'Unathorized' }}
                                </span>

                                <small class="text-muted mt-1" style="font-size: 0.75rem;">Administrator</small>
                            @endauth
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</nav>
