<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>Date</x-th>
            <x-th>Name</x-th>
            <x-th>Property</x-th>
            <x-th>Role</x-th>
            <x-th>Time in</x-th>
            <x-th>Time out</x-th>
        </tr>
    </x-table-head-component>

    <x-table-body-component>
        @foreach ($sessions as $index => $session)
        <?php
            $role_id = App\Models\UserProperty::where('user_id', $session->user_id)->value('role_id');
            $property_uuid = App\Models\UserProperty::where('user_id', $session->user_id)->value('property_uuid');
        ;?>
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{
                Carbon\Carbon::parse($session->created_at)->timezone('Asia/Manila')->format('M d, Y')}}
            </x-td>

            <x-td>{{ App\Models\User::where('id', $session->user_id)->value('name') }}</x-td>
            <x-td>{{ App\Models\Property::where('uuid', $property_uuid)->value('property')  }}</x-td>

            <x-td>{{ App\Models\Role::where('id', $role_id)->value('role') }}</x-td>
            <x-td>
                {{Carbon\Carbon::parse($session->created_at)->timezone('Asia/Manila')->format('g:i A')}}
            </x-td>
            <x-td>
                @if($session->updated_at != '')
                {{Carbon\Carbon::parse($session->updated_at)->timezone('Asia/Manila')->format('g:i
                A')}}
                @else
                NA
                @endif
            </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
