<x-index-layout>
    @section('title', 'Dashboard')
    <x-slot name="labels">
        Sales
    </x-slot>
    <x-slot name="options">
        {{-- <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-button hre>Logout</x-button>
        </form> --}}

        <x-button onclick="window.location.href='/dashboard/users'">All users</x-button>
        <x-button onclick="window.location.href='/logout'">Logout</x-button>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>ID</x-th>
                    <x-th>Created</x-th>
                    <x-th>Name</x-th>
                    {{-- <x-th>Contact</x-th> --}}
                    <x-th>Property</x-th>
                    <x-th>Plan</x-th>
                    <x-th>Checkout</x-th>
                    <x-th>Code</x-th>
                    <x-th>Trial ends</x-th>
                </tr>
            </thead>
            @foreach ($users as $user)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $user->id }}</x-td>
                    <x-td>{{ Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</x-td>

                    <x-td><a class="text-blue-600" href="user/{{ $user->username }}/activity">
                            {{ $user->name }}
                            @if($user->email_verified_at)
                            <span title="verified"
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-sm text-green-800">
                                <i class="fa-solid fa-circle-check"></i>
                            </span>
                            @else
                            <span title="unverified"
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-sm text-red-800">
                                <i class="fa-solid fa-circle-xmark"></i>
                                @endif
                            </span>
                            <a>
                    </x-td>

                    <?php
                           $property_count = App\Models\UserProperty::where('user_id', $user->id)->count();
                           
                           $unit_count = App\Models\UserProperty::join('users', 'user_properties.user_id', 'users.id')
                           ->join('properties', 'user_properties.property_uuid', 'properties.uuid')
                           ->join('units', 'user_properties.property_uuid', 'units.property_uuid')
                           ->where('user_properties.user_id', $user->id)
                           ->count();

                           $tenant_count = App\Models\UserProperty::join('users', 'user_properties.user_id', 'users.id')
                            ->join('properties', 'user_properties.property_uuid', 'properties.uuid')
                            ->join('tenants', 'user_properties.property_uuid', 'tenants.property_uuid')
                            ->where('user_properties.user_id', $user->id)
                            ->count();
                        ?>
                    <x-td>
                        <a class="text-blue-600" href="user/{{ $user->username }}/property">
                            {{ $property_count }} property,
                            {{ $unit_count }} unit,
                            {{ $tenant_count }} tenant
                        </a>
                    </x-td>
                    <x-td> 
                        {{ $user->plan->plan }}
                    </x-td>
                    <x-td>
                        @if($user->checkoutoption_id == '1')
                        <span
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-sm text-green-800">
                            {{ $user->checkoutoption->option }}
                        </span>
                        @else
                        <span
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-sm text-orange-800">
                            {{ $user->checkoutoption->option }}
                        </span>
                        @endif
                    </x-td>
                    </span>
                    <x-td>
                        {{-- {{ $user->discountcode->discount_code }} --}}
                    </x-td>
                    <x-td>
                        @if($user->trial_ends_at)
                        {{ Carbon\Carbon::parse($user->trial_ends_at)->format('M d, Y') }}
                        @else
                        N/A
                        @endif
                    </x-td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</x-index-layout>