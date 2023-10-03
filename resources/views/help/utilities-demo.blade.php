<x-new-layout>
    @section('title','Help '. env('APP_NAME'))
    <div class="mx-20 mt-4 inline-flex">
        <a href="/help">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </a>
        <p class="m-1 text-sm"> Go Back </p>
    </div>
    <div class="mt-2 bg-white min-h-screen">
        <h2 class="p-5 text-lg text-center"><span class="font-bold text-purple-700">How to Use the</span> Utilities
            Feature </h2>
        <div class="flex items-center justify-center">
            <video class="w-full max-w-2xl h-auto rounded-lg border border-gray-200 dark:border-gray-700" controls>
                <source src="/brands/utilities-demo.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <p class="pt-5 text-center text-light text-sm">A demo video for using the utilities.
        <p class="text-center text-light text-sm"><span class="font-semibold text-purple-700">
                <a href="https://thepropertymanager.online/about#contactus">Contact Us</a></span> for questions or
            concerns.</p>
        </p>
    </div>

</x-new-layout>