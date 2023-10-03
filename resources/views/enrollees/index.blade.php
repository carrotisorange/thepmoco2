<x-index-layout>
    @section('title', 'Enrollees |'. env('APP_NAME'))
    <x-slot name="labels">
        <li class="text-gray-500">
            {{ $owner->owner }}
        </li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">
            {{ Str::plural('Enrollees', $enrollees->count())}} ({{ $enrollees->count() }})
        </li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back</x-button>
    </x-slot>

    @include('tables.enrollees')

</x-index-layout>