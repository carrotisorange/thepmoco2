<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>NAME</x-th>
            <x-th>STATUS</x-th>
            <x-th>ROLE</x-th>
            <x-th>MOBILE</x-th>
            <x-th>INVITED ON</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($personnels as $index => $personnel )
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <div class="flex items-center">
                    <div class="h-10 w-10 flex-shrink-0">
                        <img onerror="this.onerror=null;this.src='{{ asset('/brands/avatar.png') }}';" class="h-10 w-10 rounded-full"
                            src="{{ asset('/storage/'.$personnel->avatar) }}" alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-gray-900">
                            {{-- <a class="text-blue-500 text-decoration-line: underline" href="/user/{{ $personnel->user->username }}/edit">
                               
                            </a> --}}
                            {{ $personnel->user->name }}
                            @if($personnel->user->email_verified_at && $personnel->user->name)
                            <span title="verified" class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fa-solid fa-circle-check"></i>
                                @else
                                <span title="unverified"
                                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                    <i class="fa-solid fa-clock"></i>
                                </span>
                                @endif
                
                        </div>
                        <div class="text-gray-500">{{
                            $personnel->user->email }}</div>
                    </div>
                </div>
            </x-td>
            <x-td>{{ $personnel->user->status }}</x-td>
            <x-td>{{ $personnel->user->role->role  }}</x-td>
            <x-td>{{ $personnel->user->mobile_number }}</x-td>
            <x-td>{{  Carbon\Carbon::parse($personnel->created_at)->format('M d, Y')}}</x-td>
            <x-td>
                <button data-modal-target="edit-personnel-modal-{{$personnel->id}}"
                    data-modal-toggle="edit-personnel-modal-{{$personnel->id}}"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    Edit
                </button>
            </x-td>
        </tr>
        @livewire('edit-personnel-component', ['property'=> $property, 'personnel' => $personnel], key(Carbon\Carbon::now()->timestamp.''.$personnel->id))
        @endforeach
    </tbody>
</table>