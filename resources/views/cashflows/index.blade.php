<x-new-layout>
    @section('title','Cashflow | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <!--
          This example requires updating your template:
        
          ```
          <html class="h-full">
          <body class="h-full">
          ```
        -->
            <div class="min-h-full bg-white px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
                <div class="mx-auto max-w-max">
                    <main class="sm:flex">
                        <p class="text-4xl font-bold tracking-tight text-indigo-600 sm:text-5xl"></p>
                        <div class="sm:ml-6">
                            <div class="sm:border-l sm:border-gray-200 sm:pl-6">
                                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Cashflow feature
                                   will be available soon.</h1>
                                <p class="mt-1 text-base text-gray-500"></p>
                            </div>
                            <div class="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                                <a href="{{ url()->previous() }}"
                                    class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Go
                                    back </a>
                                <a target="_blank" href="https://www.thepropertymanager.online/support/"
                                    class="inline-flex items-center rounded-md border border-transparent bg-indigo-100 px-4 py-2 text-sm font-medium text-indigo-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Contact
                                    support</a>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>

</x-new-layout>