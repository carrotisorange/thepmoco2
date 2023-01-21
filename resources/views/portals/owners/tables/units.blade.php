<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>

            <x-th>
                #</x-th>
            <x-th>
                PROPERTY</x-th>
            <x-th>
                UNIT</x-th>
            <x-th>
                FLOOR</x-th>
            <x-th>
               UNIT STATUS</x-th>

            <x-th>
                CURRENT CONTRACT</x-th>
            <x-th>
                RENT</x-th>
            <x-th>
                OCCUPANCY</x-th>

        </tr>
    </thead>

    @forelse ($units as $index => $unit)
    <tbody class="bg-white divide-y divide-gray-200">
        <!-- Selected: "bg-gray-50" -->
        <tr>

            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <x-td>{{
                $index+1 }}
            </x-td>
            <x-td>
               
              {{ $unit->unit->property->property }}
            </x-td>
            <x-td>
                <a href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/unit/{{ $unit->unit->uuid }}/guests"
                    class="text-indigo-500 text-decoration-line: underline">{{ $unit->unit->unit }}</a>
              
            </x-td>
            <x-td>
                {{ $unit->unit->floor->floor}}
            </x-td>
            <x-td>
                @if($unit->unit->status->status == 'active')
                <span
                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{
                    $unit->unit->status->status }}</span>
                @else
                {{ $unit->unit->status->status }}
                @endif
            </x-td>

            <x-td>
                <?php 
                   $contracts = App\Models\Unit::find($unit->unit->uuid)->contracts;    
                ;?>
                @if($contracts->count())
                @foreach ($contracts->where('status','!=','inactive')->take(1) as $contract)

                {{ Carbon\Carbon::parse($contract->start)->format('M d, Y') }}
                - {{ Carbon\Carbon::parse($contract->end)->format('M d, Y') }}

                @endforeach
                @else
                NA
                @endif
            </x-td>
            <x-td>
                {{ number_format($unit->unit->rent,2)}}
            </x-td>
            <x-td>
                {{ $unit->unit->occupancy }} pax
            </x-td>

        </tr>
    </tbody>
    @empty

    @endforelse
</table>