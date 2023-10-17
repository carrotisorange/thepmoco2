<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>Election Year</x-th>
            <x-th>House Owner</x-th>
            <x-th>Email</x-th>

            <x-th>Mobile</x-th>
            <x-th>House</x-th>
            <x-th>Number of years as HOA member</x-th>
            <x-th>Position</x-th>
            <x-th>Past Due Accounts</x-th>
            <x-th>Resume</x-th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($candidates as $index => $candidate)
        <?php
        $houseOwner = App\Models\HouseOwner::find($candidate->house_owner_id);
        $position = App\Models\Position::find($houseOwner->id)->position;
        $electionYear = Carbon\Carbon::parse(App\Models\Election::find($candidate->election_id)->created_at)->format('Y');
        $house = App\Models\House::find(App\Models\HouseOwnership::where('house_owner_id',$candidate->house_owner_id)->pluck('house_id')->first())->house;
    ?>
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $electionYear }}</x-td>
            <x-td>{{ $houseOwner->house_owner }}</x-td>
            <x-td>{{ $houseOwner->email }}</x-td>
            <x-td>{{ $houseOwner->mobile_number }}</x-td>
            <x-td>{{ $house }}</x-td>
            <x-td>{{ $candidate->number_of_years_as_hoa_member }}</x-td>
            <x-td>{{ $position }}</x-td>
            <x-td>{{ $candidate->number_of_past_due_account }}</x-td>
            <x-td>
                @if($candidate->resume)
                <a href="{{ asset('/storage/'.$candidate->resume) }}" target="_blank"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download</a>
                @endif
            </x-td>
        </tr>
        @endforeach
    </tbody>
</table>
