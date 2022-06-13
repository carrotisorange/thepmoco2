<div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    <div class="">
                        @include('utilities.create-reference-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200">
                    <div class="">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>Full Name</x-th>
                                    <x-th>Email</x-th>
                                    <x-th>Mobile</x-th>
                                    <x-th>Relationship</x-th>
                                    <x-th></x-th>
                                </tr>
                            </thead>
                            <?php $ctr = 1; ?>
                            @forelse ($references as $item)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <x-td>{{ $ctr++}}</x-td>
                                    <x-td>{{ $item->reference }}</x-td>
                                    <x-td>{{ $item->email }}</x-td>
                                    <x-td>{{ $item->mobile_number }}</x-td>
                                    <x-td>{{ $item->relationship->relationship }}</x-td>
                                    <x-td>
                                        <x-button wire:click="removeReference({{ $item->id }})"
                                            onclick="confirmMessage()">Remove
                                        </x-button>
                                    </x-td>
                                </tr>
                                @empty
                                <tr>
                                    <x-td>No data found.</x-td>
                                </tr>
                            </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.notifications')
</div>