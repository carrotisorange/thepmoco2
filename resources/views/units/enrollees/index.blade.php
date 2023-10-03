<x-index-layout>
    @section('title', 'Enrollees | '. env('APP_NAME'))
    <x-slot name="labels">
        {{ Str::plural('Enrollees', $enrollees->count())}} ({{
        $enrollees->count()
        }})
    </x-slot>

    <x-slot name="options">

    </x-slot>

    @include('tables.enrollees')

</x-index-layout>