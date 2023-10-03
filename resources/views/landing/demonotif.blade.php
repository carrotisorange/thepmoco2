
@if(session()->has('success'))
<div x-data="{show: true}" x-init="setTimeout(()=> show=false, 4000)" x-show="show"
    class="fixed bg-indigo-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
    <p>successfully submitted</p>
<div class="bg-gray-600 text-white rounded-xl">
<a href="demo">go to: thepropertymanager.online/demo</a>
</div>

</div>

@endif




