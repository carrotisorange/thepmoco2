<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Guest</x-th>
            <x-th>Unit</x-th>
            <x-th>Mobile</x-th>
            <x-th>Email</x-th>
            <x-th>Status</x-th>
            <x-th>Expected Movein</x-th>
            <x-th>Expected Moveout</x-th>
            <x-th></x-th>

        </tr>
    </thead>
    @foreach ($guests as $index => $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $index+1 }}</x-td>

            <x-td>{{ $item->guest }}</x-td>
            <x-td><a href="/property/{{ Session::get('property') }}/unit/{{ $item->unit_uuid }}"
                class="text-indigo-500 text-decoration-line: underline">{{ $item->unit }}</a></x-td>
            <x-td>{{ $item->mobile_number }}</x-td>
            <x-td>{{ $item->email }}</x-td>
            <x-td>{{ $item->status }}</x-td>
            <x-td>
                {{Carbon\Carbon::parse($item->movein_at)->format('M d, Y')}}</x-td>
            <x-td>{{Carbon\Carbon::parse($item->moveout_at)->format('M
                d, Y')}}</x-td>
            <x-td>
                @if($item->status === 'pending')
                <a href="/property/{{ Session::get('property') }}/unit/{{ $item->unit_uuid }}/guest/{{ $item->uuid }}/movein"
                    class="text-indigo-500 text-decoration-line: underline">Movein</a>
                @elseif($item->status === 'active')
                <a href="/property/{{ Session::get('property') }}/unit/{{ $item->unit_uuid }}/guest/{{ $item->uuid }}/moveout"
                    class="text-indigo-500 text-decoration-line: underline">Moveout</a>
                @endif
            </x-td>
        </tr>
    </tbody>
    @endforeach
</table>