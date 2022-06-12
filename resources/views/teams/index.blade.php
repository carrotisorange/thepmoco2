<x-index-layout>
    @section('title', '| Teams')
    <x-slot name="labels">
        Teams
    </x-slot>

    <x-slot name="options">
        <x-button
            onclick="window.location.href='/property/{{ Session::get('property') }}/team/{{ Str::random(8) }}/create'"> Create
        </x-button>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        {{-- <x-search placeholder="Search for units..."></x-search> --}}
        <div class="mt-2 mb-2">
            {{ $teams->links() }}
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Name</x-th>
                    <x-th>Contact</x-th>
                    <x-th>Status</x-th>
                    <x-th>Created</x-th>
                    <x-th>Email verified</x-th>
                    {{-- <x-th></x-th> --}}

                </tr>
            </thead>
            @forelse ($teams as $index => $item)
            <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <tr>
                    <x-td>{{ $index }}</x-td>
                    <x-td>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <a href="/profile/{{ $item->username }}/edit">
                                    <img class="h-10 w-10 rounded-full" src="/storage/{{ $item->avatar }}" alt=""></a>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{
                                    $item->name }}
                                </div>
                                <div class="text-sm text-gray-500">{{ $item->role }}
                                </div>
                            </div>
                        </div>
                    </x-td>
                    <x-td>
                        <div class="text-sm text-gray-900">{{ $item->email }}
                        </div>
                        <div class="text-sm text-gray-500">{{ $item->mobile_number }}
                        </div>
                    </x-td>
                    <x-td>
                        @if($item->status === 'active')
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-circle-check"></i> {{
                            $item->status }}
                            @else
                            <span
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                <i class="fa-solid fa-clock"></i> {{
                                $item->status }}
                            </span>
                            @endif
                    </x-td>
                    <x-td>{{ $item->created_at->diffForHumans() }}</td>
                    </x-td>
                    <x-td>{{ Carbon\Carbon::parse($item->email_verified_at)->format('M d, Y
                        @
                        h:m:s') }}</x-td>
                    {{-- <x-td><a title="show" href="/team/{{ $item->username }}/edit"
                            class="text-indigo-600 hover:text-indigo-900"><i
                                class="fa-solid fa-2x fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                    </x-td> --}}
                    @empty
                    <x-td>No data found!</x-td>
                </tr>
            </tbody>
            @endforelse
        </table>
    </div>
</x-index-layout>