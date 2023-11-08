<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>Published on</x-th>
            <x-th>Published by</x-th>
            <x-th>Title</x-th>
            <x-th>Description</x-th>
            <x-th>Attachment</x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($bulletins as $index => $bulletin)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($bulletin->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ App\Models\User::find($bulletin->user_id)->name }}</x-td>
            <x-td>{{ $bulletin->title }}</x-td>
            <x-td>{{ $bulletin->description }}</x-td>
            <x-td><a class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button" href="{{ asset('/storage/'.$bulletin->attachment) }}" target="_blank">View</a></x-td>
        </tr>
        @endforeach
    </x-table-body-component>

</x-table-component>
