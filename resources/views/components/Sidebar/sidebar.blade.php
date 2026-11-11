<!-- Toggle Button for Collapsed State (Visible when sidebar is closed) -->
<button class="btn btn-primary m-2 position-fixed top-0 start-0 z-3" type="button" id="sidebarOpenBtn"
    style="display: none;">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list"
        viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
    </svg>
</button>

<div id="mainSidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary border-end"
    style="width: 250px; min-height: 100vh;">
    <!-- Brand / Header -->
    <div class="d-flex align-items-center justify-content-between mb-3 mb-md-0 me-md-auto w-100">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-hospital text-primary me-2" viewBox="0 0 16 16">
                <path
                    d="M8.5 5.034v1.1l.953-.55.5.866L9 7l.953.55-.5.866L8.5 7.866v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.75.75 0 0 0-.75.75v4.5a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75ZM2.75 9a.75.75 0 0 0-.75.75v4.5a.75.75 0 0 0 1.5 0v-4.5A.75.75 0 0 0 2.75 9Z" />
                <path d="M5 1a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5Zm0 1h6v14H5V2Z" />
            </svg>
            <span class="fs-5 fw-bold">Patient Portal</span>
        </a>
        <!-- Close Sidebar Button -->
        <button type="button" class="btn-close" id="sidebarCloseBtn" aria-label="Close"></button>
    </div>

    <hr>

    <!-- Navigation Links -->
    <ul class="nav nav-pills flex-column mb-auto gap-1">
        <!-- Dashboard Link -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
                class="nav-link {{ Route::is('dashboard') ? 'active' : 'text-dark' }} d-flex align-items-center gap-2"
                aria-current="page">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                    class="bi bi-speedometer2" viewBox="0 0 16 16">
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm10.268-4.268a.5.5 0 0 1 0 .707l-.914.915a.5.5 0 1 1-.708-.708l.915-.914a.5.5 0 0 1 .707 0zM12 10a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12.5A.5.5 0 0 1 12 10z" />
                    <path d="M10 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
                    <path
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-6.974 6.347C1.042 7.57 1 7.783 1 8a7 7 0 0 0 13.974.347c.016-.217.026-.43.026-.653A7 7 0 0 0 8 1z" />
                </svg>
                Dashboard
            </a>
        </li>

        <!-- Patients  -->
        <li class="nav-item">
            <a href="{{ route('patient.index') }}"
                class="nav-link {{ Route::is('patient.index') ? 'active' : 'text-dark' }} d-flex align-items-center gap-2"
                aria-current="page">
                <div class="d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-people" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A4.001 4.001 0 0 1 12 11c2.65 0 3.864.999 4 1.996H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 1 1 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.936-3.72z" />
                    </svg>
                    Patients
                </div>

            </a>

        </li>

        <!-- Consultation Link -->
        <li>
            <a href="{{ route('consultation.index') }}"
                class="nav-link  {{ Route::is('consultation.index') ? 'active' : 'text-dark' }} d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                    class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path
                        d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a1 1 0 0 1-.59.915l-3.077 1.39a1 1 0 0 1-.833 0L5.423 14.21A1 1 0 0 1 3 13.295V2.5z" />
                </svg>
                Consultation
            </a>
        </li>

        <!-- linelist Link -->
        <li>
            <a href="#" class="nav-link text-dark d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                    class="bi bi-calendar-event" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                </svg>
                Linelist
            </a>
        </li>


    </ul>

    <hr>

    <!-- Bottom Quick Help / Info -->
    <div class="px-2">
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg>
                Log Out
            </button>
        </form>
    </div>
</div>

<!-- Toggle Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('mainSidebar');
        const closeBtn = document.getElementById('sidebarCloseBtn');
        const openBtn = document.getElementById('sidebarOpenBtn');

        if (sidebar && closeBtn && openBtn) {
            closeBtn.addEventListener('click', function() {
                sidebar.classList.add('d-none');
                openBtn.style.display = 'block';
            });

            openBtn.addEventListener('click', function() {
                sidebar.classList.remove('d-none');
                openBtn.style.display = 'none';
            });
        }
    });
</script>
