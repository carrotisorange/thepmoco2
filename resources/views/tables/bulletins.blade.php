<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>Published on</x-th>
            <x-th>Published by</x-th>
            <x-th>Title</x-th>
            <x-th>Description</x-th>
            <x-th>Attachment</x-th>
        </tr>
    </thead>
    @foreach ($bulletins as $index => $bulletin)
    <tbody class="bg-white divide-y divide-gray-200">
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
    </tbody>
    @endforeach
</table>
