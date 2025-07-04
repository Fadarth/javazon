<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
</head>

<body class="g-sidenav-show bg-gray-100">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Main Content --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @yield('content')
    </main>

    {{-- Footer/Scripts --}}
    @include('layouts.footer')

</body>

</html>
