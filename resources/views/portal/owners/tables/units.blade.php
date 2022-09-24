<table class="min-w-full table-fixed divide-y-8 divide-gray-50 border">

    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                #</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                PROPERTY</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                UNIT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                FLOOR</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                STATUS</th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                CONTRACT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                RENT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                OCCUPANCY</th>
          
        </tr>
    </thead>

    @forelse ($units as $index => $unit)
    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->

                {{-- <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                --}}
            </td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{
                $index+1 }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $unit->unit->property->property }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $unit->unit->unit }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $unit->unit->floor->floor}}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($unit->unit->status->status == 'active')
                <span
                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{
                    $unit->unit->status->status }}</span>
                @else
                {{ $unit->unit->status->status }}
                @endif
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
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
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ number_format($unit->unit->rent,2)}}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                {{ $unit->unit->occupancy }} pax
            </td>

        </tr>
    </tbody>
    @empty

    @endforelse
</table>