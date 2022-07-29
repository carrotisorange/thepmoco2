<x-index-layout>
    @section('title', '| User')
    <x-slot name="labels">
        User
    </x-slot>

    <x-slot name="options">
        <x-button
            onclick="window.location.href='/property/{{ Session::get('property') }}/user/{{ Str::random(8) }}/create'">
            Add a user</x-button>
    </x-slot>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Name</x-th>
                <x-th>Contact</x-th>

                <x-th>Created</x-th>
                {{-- <x-th>Email verified at</x-th> --}}
                {{-- <x-th></x-th> --}}
            </tr>
        </thead>
        @forelse ($users as $item)
        <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <tr>
                <x-td>{{ $item->id }}</x-td>
                <x-td>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <a href="/user/{{ $item->user->username }}/edit">
                                <img class="h-10 w-10 rounded-full" src="/storage/{{ $item->user->avatar }}" alt=""></a>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">{{
                                $item->user->name }}
                                @if($item->user->email_verified_at)
                                <span titl="verified"
                                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fa-solid fa-circle-check"></i>
                                    @else
                                    <span title="unverified"
                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                        <i class="fa-solid fa-clock"></i>
                                    </span>
                                    @endif
                            </div>
                            <div class="text-sm text-gray-500">{{ $item->user->role->role }}
                            </div>
                        </div>
                    </div>
                </x-td>
                <x-td>
                    <div class="text-sm text-gray-900">{{ $item->user->email }}
                    </div>
                    <div class="text-sm text-gray-500">{{ $item->user->mobile_number }}
                    </div>
                </x-td>
                <x-td>{{ Carbon\Carbon::parse($item->created_at)->timezone('Asia/Manila')->format('M d, Y @ g:i A')}}</x-td>
                {{-- <x-td>
                    @if($item->status==='active')
                    {{ Carbon\Carbon::parse($item->email_verified_at)->timezone('Asia/Manila')->format('M d, Y @
                    g:i
                    A')}}

                    @endif
                </x-td> --}}
                {{-- <x-td>
                    <x-button onclick="confirmMessage()" wire:loading.remove wire:click='removeUser({{ $item->id }})'
                        class="bg-purple-800 hover:bg-purple-700 active:bg-purple-900 focus:border-purple-900">
                        Remove</x-button>
                    <div wire:loading wire:target="removeUser">
                        Processing...
                    </div>
                </x-td> --}}
                @empty
                <x-td>No data found!</x-td>
            </tr>
        </tbody>
        @endforelse
    </table>

</x-index-layout>