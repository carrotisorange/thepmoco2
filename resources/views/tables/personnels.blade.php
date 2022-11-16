<table class="min-w-full table-fixed">
    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                #</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                NAME</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                STATUS</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                POSITION</th>
            {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                EMAIL</th> --}}
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                MOBILE</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                INVITED AT</th>


        </tr>
    </thead>


    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        @foreach($users as $index => $user )
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->

                {{-- <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                --}}
            </td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{ $index+1 }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div class="flex items-center">
                    <div class="h-10 w-10 flex-shrink-0">

                        <img onerror="this.onerror=null;this.src='{{ asset('/brands/avatar.png') }}';"
                            class="h-10 w-10 rounded-full" src="{{ asset('/storage/'.$user->avatar) }}" alt="">

                    </div>
                    <div class="ml-4">
                        <div class="text-gray-900">
                            <a class="text-blue-500 text-decoration-line: underline"
                                href="/user/{{ $user->user->username }}/edit">
                                {{ $user->user->name }}
                            </a>
                            @if($user->user->email_verified_at && $user->user->name)
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
                        <div class="text-gray-500">{{
                            $user->user->email }}</div>
                    </div>
                </div>
                {{-- <a class="text-blue-500 text-decoration-line: underline" ">{{
                                  
                                  $user->user->name }}</a> --}}
                               

                            </td>
                            <td class=" whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->user->status }}
            </td>
            <td class=" whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->user->role->role
                }}
            </td>

            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->user->email }}
            </td> --}}
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                $user->user->mobile_number }} </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                Carbon\Carbon::parse($user->created_at)->timezone('Asia/Manila')->format('M d, Y @
                g:i A')}}</td>

        </tr>
        @endforeach
        <!-- More people... -->
    </tbody>
</table>