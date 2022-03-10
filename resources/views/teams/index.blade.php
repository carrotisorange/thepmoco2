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
                                <li class="text-gray-500">Members ({{ $users->count() }})</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/team/{{ Str::random(10) }}/create'">Create member</x-button>
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    @if (!$users->count())
                                    <span class="text-center text-red">No units found!</span>
                                    @else
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
                                        @foreach ($users as $user)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    $ctr++ }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                           
                                                                <img class="h-10 w-10 rounded-full"
                                                                    src="/storage/{{ $user->avatar }}" alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">{{
                                                                $user->name }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">{{ $user->role }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $user->email }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{ $user->mobile_number }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($user->user_status === 'active')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $user->user_status }}
                                                    </span>
                                                    @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $user->user_status }}
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    $user->created_at->diffForHumans() }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="/employee/{{ $user->username }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                </td>
                                            </tr>

                                            <!-- More people... -->
                                        </tbody>
                                        @endforeach
                                    </table>
                                    @endif
                                </div>

                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>