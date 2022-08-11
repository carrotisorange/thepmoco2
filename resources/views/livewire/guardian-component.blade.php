<div>
   <div class="p-8 bg-white border-b border-gray-200">
     @include('forms.guardian-create')

   </div>

   @if($guardians->count())
   <div class="mt-5 p-8 bg-white border-b border-gray-200">

      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class="bg-gray-50">
            <tr>
               <x-th>#</x-th>
               <x-th>Full Name</x-th>
               <x-th>Email</x-th>
               <x-th>Mobile</x-th>
               <x-th>Relationship</x-th>
               {{-- <x-th></x-th> --}}
            </tr>
         </thead>
         <?php $ctr = 1; ?>
         @forelse ($guardians as $item)
         <tbody class="bg-white divide-y divide-gray-200">
            <tr>
               <x-td>{{ $ctr++}}</x-td>
               <x-td>{{ $item->guardian }}</x-td>
               <x-td>{{ $item->email }}</x-td>
               <x-td>{{ $item->mobile_number }}</x-td>
               <x-td>{{ $item->relationship->relationship }}</x-td>
               <x-td>
                  {{-- <x-button wire:click="removeGuardian({{ $item->id }})" onclick="confirmMessage()">Remove
                  </x-button> --}}
               </x-td>
            </tr>
            @empty
            <tr>
               <x-td>No data found.</x-td>
            </tr>
         </tbody>
         @endforelse
      </table>
      {{ $guardians->links() }}
   </div>
   @endif
   @include('layouts.notifications')
</div>