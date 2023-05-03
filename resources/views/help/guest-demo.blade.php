<x-new-layout>
    @section('title','Help '. Session::get('property_name'))

<div class="mt-8 bg-white min-h-screen">
    <h2 class="p-5 text-lg text-center"><span class="font-bold text-purple-700">How to Use </span> Guest Management </h2>
  <div class="flex items-center justify-center">
    <video class="w-full max-w-2xl h-auto rounded-lg border border-gray-200 dark:border-gray-700" controls>
        <source src="/brands/guest-demo.mp4" type="video/mp4">
            Your browser does not support the video tag.
    </video>
    </div>

<p class= "pt-5 text-center text-light text-sm">A demo video for managing guest and additional guest.<p class="text-center text-light text-sm"><span class="font-semibold text-purple-700">
<a href="https://thepropertymanager.online/about#contactus">Contact Us</a></span> for questions or concerns.</p></p>
</div>

</x-new-layout>