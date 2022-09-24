<table class="min-w-full table-fixed divide-y-8 divide-gray-50 border">
    <thead class="bg-yellow-950">
        <tr>
            <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">AR #</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">UNIT</th>
            {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TENANT</th> --}}
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DATE APPLIED</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DATE DEPOSITED</th>
            {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PARTICULAR</th> --}}
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">MODE OF PAYMENT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">AMOUNT PAID</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">STATUS</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"></th>
          
        </tr>
    </thead>
    @forelse ($units as $unit)
    <?php 
            $payments = App\Models\Unit::find($unit->unit->uuid)->collections()->orderBy('ar_no', 'desc')->get();    
        ;?>
    @if($payments->count())
    @foreach ($payments as $payment)
    <tbody class="divide-y divide-gray-200 bg-white">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->
{{-- 
                <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6"> --}}
            </td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{ $payment->ar_no }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $payment->unit->unit }}</td>
            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Basilio</td> --}}
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($payment->created_at)->format('M d, Y')}}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($payment->update_at)->format('M d, Y')}}
            </td>
            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $payment->particular }}</td> --}}
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $payment->form }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ number_format($payment->collection, 2) }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Approved</td>
            
        </tr>

        <!-- More people... -->
    </tbody>
    @endforeach
    @else
    NA
    @endif
    
    @empty
    
    @endforelse

  
</table>