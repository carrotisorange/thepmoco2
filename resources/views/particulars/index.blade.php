<x-app-layout>
    @section('title', '| Particulars')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Particulars ({{ $particulars->count() }})</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/particular/{{ Str::random(10) }}/create'">Create Particular   
                    </x-button>
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                @if (!$particulars->count())
                                <span class="text-center text-red">No particulars found!</span>
                                @else
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr=1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Particular</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Minimum Charge</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Due Date</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Surcharge</th>
                                            </tr>
                                        </thead>
                                        <?php $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);?>
                                        @foreach ($particulars as $particular)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    $ctr++ }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    $particular->particular }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    number_format($particular->minimum_charge, 2) }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    Every {{$numberFormatter->format($particular->due_date)}} day of
                                                    the month </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    number_format($particular->surcharge, 2) }}</td>
                                            </tr>
                                            <!-- More people... -->
                                        </tbody>
                                        @endforeach
                                    </table>

                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="mt-3">
                        {{ $particulars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Small Modal -->
    <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal md:h-full"
        id="small-modal">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        New Particular
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="small-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="/particular/{{ Str::random(10) }}/store" method="POST" id="add-particular-form">
                        @csrf
                        <div class="mt-4">
                            <x-label for="particular" :value="__('Particular')" />
                            <x-input form="add-particular-form" id="particular" class="block mt-1 w-full" type="text"
                                name="particular" required />

                        </div>
                        <div class="mt-4">
                            <x-label for="minimum_charge" :value="__('Mininum Charge')" />
                            <x-input form="add-particular-form" id="minimum_charge" class="block mt-1 w-full"
                                type="text" name="minimum_charge" required />

                        </div>

                        <div class="mt-4">
                            <x-label for="due_date" :value="__('Due Date')" />
                            <x-input form="add-particular-form" id="due_date" class="block mt-1 w-full" type="text"
                                name="due_date" required />

                        </div>

                        <div class="mt-4">
                            <x-label for="surcharge" :value="__('Surcharge')" />
                            <x-input form="add-particular-form" id="surcharge" class="block mt-1 w-full" type="text"
                                name="surcharge" required />

                        </div>
                    </form>

                </div>
                <!-- Modal footer -->
                <div class="p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <p class="text-right">
                        <x-button form="add-particular-form">Save</x-button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>