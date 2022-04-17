<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

   @include('layouts.css')
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
        <div class="mt-4">
            @include('layouts.footer');
        </div>
    </div>

    @include('layouts.notifications')
    @include('layouts.messenger-chatbot')
</body>
@include('layouts.script')
</html>