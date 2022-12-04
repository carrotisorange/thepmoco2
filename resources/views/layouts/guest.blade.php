<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <div class="mb-5">
            {{ $slot }}
        </div>
        <div class="mt-4">
            @include('layouts.footer');
        </div>
    </div>
</body>
@include('layouts.scripts')

</html>