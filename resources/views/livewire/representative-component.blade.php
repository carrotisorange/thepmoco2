<div>
    <div class="mt-5 p-6 bg-white border-b border-gray-200">
       @include('forms.representative-create')
    </div>

    @if($representatives->count())
    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <table class="text-sm min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Representative</x-th>
                    <x-th>Email</x-th>
                    <x-th>Mobile</x-th>
                    <x-th>Relationship</x-th>
                    <x-th></x-th>
                </tr>
            </thead>
            @forelse ($representatives as $index => $representative)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $index+1 }}</x-td>
                    <x-td>{{ $representative->representative }}</x-td>
                    <x-td>{{ $representative->email }}</x-td>
                    <x-td>{{ $representative->mobile_number }}</x-td>
                    <x-td>{{ $representative->relationship->relationship }}</x-td>
                    <x-td>
                        <x-button wire:click="removeRepresentative({{ $representative->id }})"
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
    @endif
    @include('layouts.notifications')
</div>