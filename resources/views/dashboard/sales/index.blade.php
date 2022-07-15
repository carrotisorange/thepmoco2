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

    <div class="">
        {{-- <x-search placeholder="Enter name, email, and mobile..."></x-search>
        <div class="mt-2 mb-2">
            {{ $tenants->links() }}
        </div>--}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50">
                    <tr>
                        <x-th>ID</x-th>
                        <x-th>Account Created</x-th>
                        <x-th>Email verified</x-th>
                        <x-th>Name</x-th>
                        <x-th>Contact</x-th>

                        <x-th>Plan</x-th>
                        <x-th>Trial ends</x-th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <x-td>{{ $user->id }}</x-td>
                        <x-td>{{ Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</x-td>
                        <x-td>{{ $user->email_verified_at?$user->email_verified_at:'N/A' }}</x-td>
                        <x-td>{{ $user->name }}</x-td>
                        <x-td>
                            <div class="text-sm text-gray-900">{{ $user->email }}
                            </div>
                            <div class="text-sm text-gray-500">{{
                                $user->mobile_number }}
                            </div>
                        </x-td>
                        <x-td>{{ $user->external_id }}</x-td>
                        <x-td>{{ Carbon\Carbon::parse($user->trial_ends_at)->format('M d, Y') }}</x-td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

</x-index-layout>