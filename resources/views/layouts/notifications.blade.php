@if(session()->has('success'))
<div x-data="{show: true}" x-init="setTimeout(()=> show=false, 4000)" x-show="show"
    class="fixed bg-indigo-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
    <p><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</p>
</div>
@endif

@if(session()->has('error'))
<div x-data="{show: true}" x-init="setTimeout(()=> show=false, 4000)" x-show="show"
    class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
    <p><i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}</p>
</div>
@endif