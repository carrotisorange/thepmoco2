<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>Date of Election</x-th>
            <x-th>Proxy Voting?</x-th>
            <x-th>Time Limit</x-th>
            <x-th>Mode of Election</x-th>
            <x-th>No of Voters</x-th>
            <x-th>No of candidates</x-th>
            <x-th>Status</x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach($elections as $index => $election )
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td><a class="text-blue-500 text-decoration-line: underline"
                href="/property/{{ Session::get('property_uuid') }}/election/{{ $election->id }}/create/step-1">
               {{ Carbon\Carbon::parse($election->date_of_election)->format('M d, Y') }}
            </a></x-td>
            <x-td>{{ $election->is_proxy_voting_allowed }}</x-td>
            <x-td>{{ $election->time_limit }} hours</x-td>
            <x-td>{{ $election->mode_of_conducting_election }}</x-td>
            <x-td>0</x-td>
            <x-td>1</x-td>
            <x-td>{{ $election->status }}</x-td>

        @endforeach
    </x-table-body-component>
</x-table-component>
