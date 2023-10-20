@if(session()->has('success'))
<div x-data="{show: true}" x-init="setTimeout(()=> show=false, 4000)" x-show="show"
    class="z-40 fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-md">
    <p><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</p>
</div>
@endif

@if(session()->has('error'))
<div x-data="{show: true}" x-init="setTimeout(()=> show=false, 4000)" x-show="show"
    class="z-40 fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-md">
    <p><i class="fa-solid fa-circle-xmark"></i> {{ session('error') }} </p>
</div>
@endif

@if (count($errors) > 0)
<div x-data="{show: true}" x-init="setTimeout(()=> show=false, 4000)" x-show="show"
    class="z-40 fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-md">
    @foreach ($errors->all() as $error)
    <p><i class="fa-solid fa-circle-xmark"></i> {{ $error }} </p>
    @endforeach
</div>
@endif
