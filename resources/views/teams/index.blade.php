<x-app-layout>
    @section('title', '| Team')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">
                                    {{ Str::plural('Team', $members->count())}} ({{ $members->count()
                                    }})
                                </li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/team/{{ Str::random(10) }}/create'"><i
                            class="fa-solid fa-circle-plus"></i>&nbspTeam
                    </x-button>
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
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
                                        <?php $ctr = 1 ?>
                                        @forelse ($members as $item)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <x-td>{{ $ctr++ }}</x-td>
                                                <x-td>
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <a href="/profile/{{ $item->username }}/edit">
                                                                <img class="h-10 w-10 rounded-full"
                                                                    src="/storage/{{ $item->avatar }}" alt=""></a>
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
                                                    <span
                                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
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

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>