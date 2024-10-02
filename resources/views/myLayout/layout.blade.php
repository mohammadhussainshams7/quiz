<!DOCTYPE html>
<html lang="en">

@include('pages.head')
<body>
    @include('pages.header')
    @include('pages.aside')
    <main id="main" class="main">
        @yield('main-section')
    </main>
    @include('pages.footer')
    @include('pages.script')
</body>
</html>
