<x-index-layout>
    @section('title', '| Point')
    <x-slot name="labels">
        Point
    </x-slot>

    <x-slot name="options">
        {{-- <span class="text-center text-red">Total Redeemable Points: {{ $points->sum('point')
            }}</span> --}}
        <x-button wire:submit.prevent="submitForm" onclick="window.location.href='{{ url()->previous() }}'">
            Go back
        </x-button>
    </x-slot>

    <div class="p-8 bg-white border-b border-gray-200">
        <div class="features-content">
            <h4 class="feature-title">1. What are points?</h4>
            <p class="text-sm">Points are earned through specific actions, and one single point is equivalent to 1
                PHP.</p>
        </div>
        <div class="features-content">
            <h4 class="feature-title">2. How can I increase my points?</h4>
            <p class="text-sm">Use the thepmoco more: add a unit, lease or close a tenant contract, post a bill, and
                etc.</p>
        </div>
        <div class="features-content">
            <h4 class="feature-title">3.How to redeem my points?</h4>
            <p class="text-sm">Please get in touch with your manager.</p>
            {{-- <p class="text-sm">At the top right portion of the system, where your username is located, click the
                dropdown and click the chatify messenger. Once you're on it, search for "Landley Bernardo" and
                express your desire to redeem your points.</p> --}}
        </div>
    </div>

    <table class="mt-5 w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Property</x-th>
                <x-th>Action</x-th>
                <x-th>Point</x-th>
                <x-th>Earned on</x-th>
            </tr>
        </thead>
        @forelse ($points as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>
                    <div class="flex items-center">

                        <div class="">
                            <div class="text-sm font-medium text-gray-900">
                                <b>{{
                                    $item->property->property }}</b>
                            </div>
                            <div class="text-sm text-gray-500">{{
                                $item->property->type->type
                                }}
                            </div>
                        </div>
                    </div>
                </x-td>
                <x-td>{{ $item->action->action }}</x-td>
                <x-td>{{$item->point}} points</x-td>
                <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                </x-td>

                @empty

                <x-td>No data found.</x-td>

            </tr>
        </tbody>
        @endforelse
    </table>


</x-index-layout>