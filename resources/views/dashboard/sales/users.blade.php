<x-index-layout>
    @section('title', 'Dashboard')
    <x-slot name="labels">
        Sales
    </x-slot>
    <x-slot name="options">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-button hre>Logout</x-button>
        </form>
    </x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Created</x-th>
                    <x-th>Name</x-th>
                    <x-th>Role</x-th>
                    <x-th>Mobile</x-th>
                    <x-th>Email</x-th>
                    <x-th>Property</x-th>

                    <x-th>Trial ends</x-th>
                </tr>
            </thead>
            @foreach ($users as $index => $user)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $index + 1 }}</x-td>

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
                    <x-td>
                        {{ $user->role->role }}
                    </x-td>
                    <x-td>
                        {{ $user->mobile_number }}
                    </x-td>
                    <x-td>
                        {{ $user->email }}
                    </x-td>

                    <?php $property = App\Models\UserProperty::where('user_id', $user->id)->count();?>
                    <x-td>
                        <a class="text-blue-600" href="user/{{ $user->username }}/property">
                            {{ $property }}
                        </a>
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