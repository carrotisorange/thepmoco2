<div class="">
    <x-search placeholder="Search for owners..."></x-search>
    <div class="mt-2 mb-2">
        {{ $owners->links() }}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Name</x-th>

                    <x-th>Occupation</x-th>
                    <x-th>Contact</x-th>
                    <x-th>Address</x-th>
                </tr>
            </thead>
            @forelse ($owners as $index => $owner)
            <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <tr>
                    <x-td>{{ $index + $owners->firstItem() }}</x-td>
                    <x-td>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <a href="/owner/{{ $owner->uuid }}/edit"><img class="h-10 w-10 rounded-full"
                                        src="/storage/{{ $owner->photo_id }}" alt=""></a>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900"><b>{{
                                        $owner->owner }}</b>
                                </div>
                                <div class="text-sm text-gray-500">{{ $owner->type }}
                                </div>
                            </div>
                        </div>
                    </x-td>

                    <x-td>{{ $owner->occupation?$owner->occupation:'Not specified' }}</x-td>
                    <x-td>
                        <div class="text-sm text-gray-900">{{ $owner->email }}
                        </div>
                        <div class="text-sm text-gray-500">{{ $owner->mobile_number }}
                        </div>
                    </x-td>
                    <x-td>
                        <div class="text-sm text-gray-900">{{ $owner->province->province.',
                            '.$owner->city->city.', '.$owner->barangay }}
                        </div>
                        <div class="text-sm text-gray-500">{{
                            $owner->country->country }}
                        </div>
                    </x-td>
                    @empty
                    <x-td>
                        No data found!
                    </x-td>
                </tr>
            </tbody>
            @endforelse
        </table>
    </div>
</div>