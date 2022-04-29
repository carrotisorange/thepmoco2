<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation-properties')
 
        {{ $header }}
        <main>
        {{ $body }}
        </main>
    </div>
    @include('utilities.role-access-modal')
    @include('layouts.script')
</body>

</html>