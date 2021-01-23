<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
{{-- Assets y metaetiquetas de cabecera --}}
@include('layouts.head')
<body>

    @include('layouts.header')
    {{-- Contenido de la página --}}
    <div class="py-4">
        @yield('content')
    </div>
    {{-- Footer --}}
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('css')
    @yield('styles')
    @yield('style')

    @yield('javascript')
</body>
</html>
