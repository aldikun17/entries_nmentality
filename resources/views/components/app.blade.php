@include('components.Header.header')

@include('components.Navbar.navbar')

<div class="d-flex">

    @auth
        @include('components.Sidebar.sidebar')
    @endauth
    <main class="flex-grow-1 p-4">
        @yield('content')

    </main>

</div>


@include('components.Footer.footer')
