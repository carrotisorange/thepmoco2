<div>
        <div class="sm:flex sm:items-center justify-between pb-8">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Remittances</h1>
               <button type="button" data-modal-toggle="instructions-create-remittance-modal"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    type="button">Create remittance
                </button>
            </div>
            <div class="flex justify-end">
               
                <p class="text-sm font-light">Filter by Month:</p>

                <select id="small" wire:model="created_at"
                    class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="{{ $created_at }}">{{ Carbon\Carbon::parse($created_at)->format('M, Y') }}</option>  
                   @foreach ($dates as $date)
                    @if(Carbon\Carbon::parse($date->created_at)->format('M, Y') != Carbon\Carbon::parse($created_at)->format('M, Y'))
                        <option value="{{ $date->created_at }}">{{ Carbon\Carbon::parse($date->created_at)->format('M, Y') }}</option>
                    @endif
                   @endforeach
                </select>

            </div>
        </div>



        <div class="pb-16">
            <div class="outer-wrapper">
                <div class="table-wrapper">
                    @include('tables.remittances')
                </div>
            </div>
        </div>
        @include('modals.instructions.create-remittance-modal')
        @include('layouts.notifications')
</div>
