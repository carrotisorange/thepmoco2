<x-new-layout>
    <div class="mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 xl:py-10">
        <div class="lg:border-t lg:border-b lg:border-gray-200">
        <nav class="mx-auto max-w-9xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
                <ol role="list" class="overflow-hidden rounded-md lg:flex lg:rounded-none lg:border-l lg:border-r lg:border-gray-200">
                @foreach ($subfeaturesArray as $index => $subfeature)
                    <!-- Step 1 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                            <!-- Current Step -->
                            @if($subfeature == 'InternalDocument' || $subfeature == 'Approval(Manager)' || $subfeature == 'Approval(AccountPayable)' || $subfeature == 'Payment')
                           <x-previous-step-stepper-component index={{ $index+1 }}
                                link="/property/{{ Session::get('property_uuid') }}/rfp/{{ $accountpayable->id }}/step-{{ $index+1 }}"
                                subfeature="{{ $subfeature }}" />

                            @include('layouts.separator')

                            @elseif($subfeature == 'Liquidation')
                          <x-current-step-stepper-component index={{ $index+1 }}
                            link="/property/{{ Session::get('property_uuid') }}/rfp/{{ $accountpayable->id }}/step-{{ $index+1 }}"
                            subfeature="{{ $subfeature }}" />
                            <!-- Separator -->
                            @include('layouts.separator')
                            @else
                            <x-next-step-stepper-component index={{ $index+1 }}
                                link="/property/{{ Session::get('property_uuid') }}/rfp/{{ $accountpayable->id }}/step-{{ $index+1 }}"
                                subfeature="{{ $subfeature }}" />
                            @include('layouts.separator')
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ol>
            </nav>
        </div>
        @livewire('account-payable-create-step5-component', ['accountpayable' => $accountpayable])
    </div>
</x-new-layout>
