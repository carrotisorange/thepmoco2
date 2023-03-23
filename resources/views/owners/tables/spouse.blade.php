<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
           
            <x-th>
                NAME
            </x-th>
          
            <x-th>
                MOBILE
            </x-th>
            <x-th>
                EMAIL
            </x-th>
          
        </tr>
    </thead>

    @foreach ($spouse as $index => $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <!-- Selected: "bg-gray-50" -->
        <tr>
           
            <x-td>
                {{ $item->spouse }}
            </x-td>
            <x-td>
                {{ $item->mobile_number }}
            </x-td>
            <x-td>
                {{ $item->email }}
            </x-td>
          
        </tr>

    </tbody>

    @endforeach

</table>

