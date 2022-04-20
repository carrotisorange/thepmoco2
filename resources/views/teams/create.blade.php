<x-app-layout>
    @section('title', '| Team | Create')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/properties/" class="text-blue-600 hover:text-blue-700">Properties</a></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session::get('property') }}/team"
                                        class="text-blue-600 hover:text-blue-700">Team</a></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Create</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    @if ($members->count())
                    <form method="POST" action="/team/{{ Str::random(8) }}/save">
                        @csrf
                        @method('patch')
                        <x-button>Save</x-button>
                    </form>
                    @else
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}'"><i class="fa-solid fa-forward"></i>&nbspSkip</x-button>
                    @endif
                </h5>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    @livewire('team-component', ['roles' => $roles])
                    <br>
                    @if (!$members->count())
                   
                    @else
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact</th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created on</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <?php $ctr = 1 ?>
                            @foreach ($members as $member)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $ctr++ }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">

                                                <img class="h-10 w-10 rounded-full" src="/storage/{{ $member->avatar }}"
                                                    alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{
                                                    $member->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{ $member->role }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $member->email }}
                                        </div>
                                        <div class="text-sm text-gray-500">{{ $member->mobile_number }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($member->user_status === 'active')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $member->user_status }}
                                        </span>
                                        @else
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ $member->user_status }}
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $member->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/team/{{ $member->user_id }}/delete" id="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button class="text-red-600 hover:text-red-900"
                                                form="delete-form">Remove</button>
                                        </form>

                                    </td>
                                </tr>

                                <!-- More people... -->
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>