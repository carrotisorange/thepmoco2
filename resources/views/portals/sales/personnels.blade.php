<x-sale-portal-layout>
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700">
                        {{ucfirst(Route::current()->getName())}}
                    </h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                </div>
            </div>

            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">

                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    {{ $personnels->links() }}
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
                                    <x-th>Property</x-th>
                                    <x-th>Name</x-th>
                                    <x-th>Email</x-th>
                                    <x-th>Mobile</x-th>
                                    <x-th>Role</x-th>
                                    <x-th>Is Approved?</x-th>
                                </tr>
                            </thead>
                            @foreach ($personnels as $index => $personnel)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <x-td>{{ $index + 1 }}</x-td>

                                    <x-td>{{ Carbon\Carbon::parse($personnel->created_at)->format('M d, Y') }}</x-td>

                                    <x-td><span title="{{App\Models\Property::where('uuid', $personnel->property_uuid)->value('property')}}">{{ Str::limit(App\Models\Property::where('uuid', $personnel->property_uuid)->value('property'), 10) }}</span></x-td>
                                    <x-td>{{ App\Models\User::where('id', $personnel->id)->value('name') }}</x-td>
                                    <?php
                                        $email = App\Models\User::where('id', $personnel->id);
                                    ?>
                                    <x-td><a class="text-blue-600" href="#/">
                                            {{ $email->value('email') }}
                                            @if($email->value('email_verified_at'))
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

                                    <x-td>{{ App\Models\User::where('id', $personnel->id)->value('mobile_number') }}</x-td>
                                    <x-td>{{ App\Models\Role::where('id', $personnel->role_id)->value('role') }}</x-td>
                                    <x-td>
                                        @if($personnel->is_approved)
                                       Yes
                                        @else
                                        No
                                        @endif
                                    </x-td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>

                </div>
            </div>
        </div>


    </div>
</x-sale-portal-layout>
