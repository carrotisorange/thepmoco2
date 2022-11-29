<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>NAME</x-th>
            <x-th>STATUS</x-th>
            <x-th>POSITION</x-th>
            <x-th>MOBILE</x-th>
            <x-th>INVITED AT</x-th>
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
                            <a class="text-blue-500 text-decoration-line: underline" href="/user/{{ $personnel->user->username }}/edit">
                                {{ $personnel->user->name }}
                            </a>
                            @if($personnel->user->email_verified_at && $personnel->user->name)
                            <span titl="verified" class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
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
            <x-td>{{  Carbon\Carbon::parse($personnel->created_at)->timezone('Asia/Manila')->format('M d, Y @:i A')}}</x-td>
        </tr>
        @endforeach
    </tbody>
</table>