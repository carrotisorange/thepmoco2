<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Contact</x-th>
            <x-th>Invited at</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    @foreach ($users as $item)
    <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <tr>
            <x-td>{{ $item->id }}</x-td>
            <x-td>
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <a href="/user/{{ $item->user->username }}/edit">
                            <img class="h-10 w-10 rounded-full" src="/storage/{{ $item->user->avatarUrl() }}"
                                alt=""></a>
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
            <x-td>{{ Carbon\Carbon::parse($item->created_at)->timezone('Asia/Manila')->format('M d, Y @ g:i A')}}
            </x-td>

            <x-td>
                @can('accountowner')
                <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->id }}"
                    type="button">
                    Delegate
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </x-button>

                <div id="dropdownDivider.{{ $item->id }}"
                    class="hidden z-10 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1" aria-labelledby="dropdownDividerButton">
                        @foreach ($properties as $property)

                        <li>
                            <a href="/property/{{ Session::get('property') }}/user/{{ $item->user->id }}/property/{{ $property->property->uuid }}/delegate"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                {{ $property->property->property.' '.$property->property->type->type }}
                            </a>
                        </li>

                        @endforeach
                    </ul>

                </div>
                @endcan
            </x-td>
        </tr>
        @endforeach
    </tbody>
</table>