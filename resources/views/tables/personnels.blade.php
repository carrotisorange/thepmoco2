<x-table-component>
   <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>NAME</x-th>
            <x-th>ROLE</x-th>
            <x-th>MOBILE</x-th>
            <x-th>ADDED ON</x-th>
            <x-th>IS AUTHORIZED?</x-th>
            <x-th></x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
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
            <x-td>{{ App\Models\Role::find($personnel->role_id)->role }}</x-td>
            <x-td>{{ $personnel->user->mobile_number }}</x-td>
            <x-td>{{  Carbon\Carbon::parse($personnel->created_at)->format('M d, Y')}}</x-td>
            <x-td>
                @if($personnel->is_approved == '1')
                Yes
                @else
                No
                @endif
            </x-td>
            <x-td>
                <x-button data-modal-toggle="edit-personnel-modal-{{$personnel->id}}">
                    Edit
                </x-button>
            </x-td>
        </tr>
        @livewire('edit-personnel-component', ['personnel' => $personnel], key(Carbon\Carbon::now()->timestamp.''.$index.''.$personnel->id))
        @endforeach
    </x-table-body-component>
</x-table-component>
