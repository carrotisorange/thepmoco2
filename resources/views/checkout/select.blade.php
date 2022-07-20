<x-index-layout>
    @section('title', 'Select a Plan | The PMO Co')
    <x-slot name="labels">
        Select a plan... </x-slot>

    <x-slot name="options">

    </x-slot>

    <!-- component -->
    <!-- component -->
    <div class="p-12 flex flex-wrap justify-center gap-12 container mx-auto bg-gray-50">

        <!-- Style 1 -->
        <div class="w-[360px] h-[480px] py-8 px-1">
            <div
                class="relative flex flex-col justify-center items-center w-[300px] h-[400px] mx-auto p-2 bg-slate-50 border-slate-900 text-slate-50 shadow-lg rounded-3xl hover:shadow-xl">

                <h3
                    class="absolute -top-5 -left-5 w-32 p-2 bg-slate-800 rounded-3xl text-2xl font-merriweather text-center">
                    Regular
                </h3>

                <div
                    class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Free Trial </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Try for FREE. You will only be charged
                        after the trial expires.
                    </p>
                    <button onclick="window.location.href='/plan/1/checkout/2/get'"
                        class="text-xl w-full px-6 py-2 text-purple-200 bg-purple-900 hover:bg-purple-1200">
                        Try Now
                    </button>
                 
                    {{-- <x-button>Try Now</x-button> --}}
                </div>

            </div>
        </div>

        <!-- Style 2 -->
        <div class="w-[360px] h-[480px] py-8 px-1">
            <div
                class="relative flex flex-col justify-center items-center w-[300px] h-[400px] mx-auto p-2 bg-slate-50 border-slate-900 border-2 rounded-3xl">

                <h3
                    class="absolute -top-5 -left-5 w-32 p-2 bg-inherit border-slate-900 text-slate-900 border-2 rounded-3xl text-2xl font-merriweather text-center">
                    Promo
                </h3>

                <div
                    class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Access all features</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Pay only Php<span class="line-through">
                            2,400.00</span> 950.00 per month for 6 months.
                    </p>
                    <button onclick="window.location.href='/plan/3/checkout/1/get'"
                        class="w-full text-xl px-6 py-2 text-purple-200 bg-purple-900 hover:bg-purple-1200">
                        Buy Now
                    </button>
                    {{-- <x-button onclick="window.location.href=''">Try Now</x-button> --}}
                </div>

                <p
                    class="absolute -bottom-12 left-6 w-[300px] p-4 bg-inherit border-slate-900 text-slate-900 border shadow-lg rounded-3xl hover:text-black hover:shadow-xl">
                    Promo is available until July 31, 2022.
                </p>

            </div>
        </div>
    </div>
</x-index-layout>