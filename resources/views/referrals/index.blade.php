<x-index-layout>
    @section('title', 'Referrals | '. env('APP_NAME'))
    <x-slot name="labels">
       
        <li class="text-gray-500">
            {{ Str::plural('Referral', $referrals->count())}} ({{ $referrals->count() }})
        </li>
    </x-slot>

    <x-slot name="options">

    </x-slot>

   @include('tables.referrals')
</x-index-layout>
