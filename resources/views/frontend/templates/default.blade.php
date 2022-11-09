<!DOCTYPE html>
<html lang="en">

@include('frontend.partials.head')

<body>
    {{-- Navigation --}}
    @include('frontend.partials.navigation')

    {{-- Content --}}
    <div class="container">
        @yield('content')
    </div>

    @include('frontend.partials.scripts')
    @include('frontend.partials.toast')
</body>
</html>