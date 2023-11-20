<x-modal-component>

    <x-slot name="id">
        view-accountpayable-modal-{{$accountpayable->id}}
    </x-slot>
    <div class="flex max-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">View Particulars

                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>
            <form wire:submmit.prevent="closeView()">
                <div class="mt-5 sm:mt-6">
                    <label class="text-md" for="start">Particulars</label>
                    <br>
                    <span class="text-sm">
                        <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get() ;?>
                        @if(!$particulars->count())
                        No particulars found!
                        @else
                        @foreach ($particulars as $index=> $particular)
                        <ul type="disc">
                            <li>{{ $index+1 }} -

                                {{ $particular->item}} |

                                {{ $particular->price * $particular->quantity }}
                            </li>
                        </ul>

                        @endforeach
                        @endif
                        <hr>
                        <br>
                        Total - {{ number_format($accountpayable->amount, 2) }}
                    </span>

                </div>

                <div class="mt-5 sm:mt-6">

                    <button type="button" data-modal-toggle="view-accountpayable-modal-{{$accountpayable->id}}"
                        class="w-full">
                        Close
                    </button>

                </div>
            </form>
        </div>
    </div>
</x-modal-component>
