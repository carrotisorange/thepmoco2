<x-sale-portal-layout>
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700" wire:ignore>
                        {{ucfirst(Route::current()->getName())}}
                    </h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">


                </div>
            </div>

            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            {{ $signups->links() }}
                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50">
                            <tr>
                               <x-th>#</x-th>
                                <x-th>Created On</x-th>
                                <x-th>Name</x-th>
                                <x-th>Gender</x-th>
                                <x-th>Email</x-th>
                                <x-th>Mobile</x-th>
                                <x-th>Property</x-th>
                                {{-- <x-th>Plan</x-th> --}}

                                <x-th>Trial ends On</x-th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($signups as $index => $signup)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <x-td>{{ $index+1 }}</x-td>
                                    <x-td>{{ Carbon\Carbon::parse($signup->created_at)->format('M d, Y') }}</x-td>
                                    <?php $role_id = App\Models\UserProperty::where('user_id', $signup->user_id)->value('role_id') ;?>
                                    <x-td><a class="text-blue-600" href="#/">
                                            {{ $signup->name }}

                                            <a>
                                    </x-td>
                                    <x-td>{{ $signup->gender }}</x-td>
                                    <x-td>{{ $signup->email }}
                                    @if($signup->email_verified_at)
                                    <span title="verified" class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-sm text-green-800">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </span>
                                    @else
                                    <span title="unverified" class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-sm text-red-800">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                        @endif
                                    </span>
                                    </x-td>
                                    <x-td>{{ $signup->mobile_number }}</x-td>

                                    <?php
                                                   $property_count = App\Models\UserProperty::where('user_id', $signup->id)->count();

                                                   $unit_count = App\Models\UserProperty::join('users', 'user_properties.user_id', 'users.id')
                                                   ->join('properties', 'user_properties.property_uuid', 'properties.uuid')
                                                   ->join('units', 'user_properties.property_uuid', 'units.property_uuid')
                                                   ->where('user_properties.user_id', $signup->id)
                                                   ->count();

                                                   $tenant_count = App\Models\UserProperty::join('users', 'user_properties.user_id', 'users.id')
                                                    ->join('properties', 'user_properties.property_uuid', 'properties.uuid')
                                                    ->join('tenants', 'user_properties.property_uuid', 'tenants.property_uuid')
                                                    ->where('user_properties.user_id', $signup->id)
                                                    ->count();
                                                ?>
                                    <x-td>
                                        <a class="text-blue-600" href="/{{auth()->user()->role_id}}/sale/{{ auth()->user()->username }}/{{ auth()->user()->id }}/properties">
                                            {{ $property_count }} property,
                                            {{ $unit_count }} unit,
                                            {{ $tenant_count }} tenant
                                        </a>
                                    </x-td>
                                    {{-- <x-td>
                                        {{ $signup->plan->plan }}
                                    </x-td> --}}

                                    <x-td>
                                        @if($signup->trial_ends_at)
                                        {{ Carbon\Carbon::parse($signup->trial_ends_at)->format('M d, Y') }}
                                        @else
                                        N/A
                                        @endif
                                    </x-td>
                                </tr>
                            </tbody>
                            @endforeach
                        </tbody>
                    </table>

                    </div>

                </div>
            </div>
        </div>


    </div>
</x-sale-portal-layout>
