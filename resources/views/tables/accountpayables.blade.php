
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
   <thead class="">
        <tr class="">
            <x-th class="sticky-col first-col">REQUESTED ON</x-th>
            <x-th class="sticky-col first-col">BATCH NO</x-th>
            <x-th class="sticky-col first-col">REQUESTER</x-th>
            <x-th class="sticky-col first-col">FIRST APPROVER</x-th>
            <x-th class="sticky-col first-col">SECOND APPROVER</x-th>
            <x-th class="sticky-col first-col">STATUS</x-th>
            <x-th class="sticky-col first-col">UNITS</x-th>
            <x-th class="sticky-col first-col">PARTICULARS</x-th>
            <x-th class="sticky-col first-col">AMOUNT</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($accountpayables as $index => $accountpayable)
        <tr>
            <x-td>{{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $accountpayable->batch_no }} </x-td>

                        <?php $firstName= explode(' ', $accountpayable->requester->name); ?>
            <x-td>{{ Str::limit($firstName[0], 10) }}</x-td>

    <x-td>{{ (App\Models\User::where('id', $accountpayable->approver_id)->pluck('name')->first()) }}</x-td>
    <x-td>{{ (App\Models\User::where('id', $accountpayable->approver2_id)->pluck('name')->first()) }}</x-td>
     <x-td>{{ $accountpayable->status }}</x-td>
            <x-td>
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->limit(2)->get()->unique('unit_uuid'); ?>
                @foreach ($particulars as $particular)
                @if($particular->unit_uuid)
                {{
                Str::limit(App\Models\Unit::find($particular->unit_uuid)->unit,20) }},
                @else
                NA
                @endif
                @endforeach

            </x-td>
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->limit(2)->get()->unique('unit_uuid'); ?>
            <x-td>
                ({{ App\Models\AccountPayableParticular::where('batch_no',
                $accountpayable->batch_no)->count(); }})
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->limit(2)->get() ;?>
                @foreach ($particulars->take(1) as $particular)
                {{ ($particular->item) }}...
                @endforeach
            </x-td>
            <?php
                $amount = App\Models\AccountPayableParticular::
                where('batch_no', $accountpayable->batch_no)
                ->sum('total')
            ;?>
            <x-td>{{ number_format($amount, 2) }}</x-td>
            <x-td>
                @if($accountpayable->requester_id == auth()->user()->id && ($accountpayable->status=="pending" || $accountpayable->status == "rejected by manager"))
                <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/step-1"
                    class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                    bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">
                    View
                </a>
                @elseif($accountpayable->status == "pending" && $accountpayable->approver_id == auth()->user()->id)
                 <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/step-2"
                        class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                        bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        type="button">
                        Approve
                 </a>
                @elseif(($accountpayable->approver2_id == auth()->user()->id || Session::get('role_id') == 4) && ($accountpayable->status=='approved by manager'))
                <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/step-3"
                        class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                        bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        type="button">
                        Approve
                </a>
                @elseif(($accountpayable->approver2_id == auth()->user()->id || Session::get('role_id') == 4) && ($accountpayable->status=='approved by ap'))
                <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/step-4"
                    class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                    bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">
                    Upload a payment
                </a>
                @elseif(auth()->user()->id == $accountpayable->requester_id && ($accountpayable->status=='released'))
                <a target="_blank" href="/property/{{ $accountpayable->property->uuid }}/rfp/{{ $accountpayable->id }}/step1/export"
                      class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                        bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        type="button">
                    Export
                </a>
                <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/step-5"
                    class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                    bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">
                    Liquidate
                </a>
                @elseif($accountpayable->approver_id == auth()->user()->id && ($accountpayable->status=='liquidated'))
                <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/step-6"
                    class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                    bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">
                    Approve
                </a>
                @elseif($accountpayable->approver2_id == auth()->user()->id && ($accountpayable->status=='liquidation approved by manager'))
                <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/step-7"
                    class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                    bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">
                    Chart of Account
                </a>
                @elseif(($accountpayable->status=='completed'))
                <a target="_blank" href="/property/{{ Session::get('property_uuid')}}/rfp/{{ $accountpayable->id}}/export/complete"
                    class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                    bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">
                  Export
                </a>
                <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/step-7"
                    class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                    bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">
                  Edit
                </a>
                @else
                @endif
            </x-td>
        </tr>
        @endforeach
        <tr>
            <x-td><b>Total</b></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td><b>{{ number_format($accountpayables->sum('amount'), 2) }}</b></x-td>
            <x-td></x-td>
        </tr>
    </tbody>
</table>
