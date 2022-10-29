<div>
    @include('layouts.notifications')
    <div class="mt-8">
        
        <div class="max-full mx-auto sm:px-6">
            <div class="mx-5 sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-bold text-gray-700">{{ $contract_details->tenant->tenant }}</h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                
                        {{-- <button type="button"
                            onclick="window.location.href='/property/{{ Session::get('property') }}/user/{{ Str::random(8) }}/create'"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            New Employee
                        </button> --}}
                
                    </div>
                </div>
            @include('forms.contract-edit')
        </div>
    </div>
</div>
