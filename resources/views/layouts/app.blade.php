<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
</head>

<body class="g-sidenav-show bg-gray-100">

    @include('layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>

</html>
