<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Concerns</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button onclick="window.location.href='/property/{{ Session::get('property') }}/concern/create'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">New Concern</button>
             
            </div>
        </div>
    
    
    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-4">
        
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                <div class="relative w-full mb-5">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:model="search"
                        class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search..." required>
        
                </div>
                <div>
                    <p class="text-sm text-center text-gray-500">
                        Showing
                        <span class="font-medium">{{ $concerns->count() }}</span>
        
                        {{Str::plural('results', $concerns->count())}}
                    </p>
                </div>
            </div>
        
            <div class="sm:col-span-2">
                <select id="small" wire:model="status"
                    class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="">Filter concern status</option>
                    @foreach ($statuses as $item)
                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                    @endforeach
                </select>
        
            </div>
        
        </div>
    
    
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
    
    
    
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
    
                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
    
                    </div>
    
                @include('tables.concerns')
                </div>
                {{-- <button type="button"
                    class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                    All</button> --}}
            </div>
        </div>
    </div>
</div>
