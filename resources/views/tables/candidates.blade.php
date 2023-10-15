<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>Election Year</x-th>
            <x-th>House Owner</x-th>
            <x-th>House</x-th>
            <x-th>Number of years as HOA member</x-th>
            <x-th>Position</x-th>
            <x-th>Past Due Accounts</x-th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($voters as $index => $voter)
    <?php
        $houseOwner = App\Models\HouseOwner::find($voter->house_owner_id);
        $position = App\Models\Position::find($houseOwner->id)->position;
        $electionYear = Carbon\Carbon::parse(App\Models\Election::find($voter->election_id)->created_at)->format('Y');
        $house = App\Models\House::find(App\Models\HouseOwnership::where('house_owner_id',$voter->house_owner_id)->pluck('house_id')->first())->house;
    ?>
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $electionYear }}</x-td>
            <x-td>{{ $houseOwner->house_owner }}</x-td>
            <x-td>{{ $house }}</x-td>
            <x-td>{{ $voter->number_of_past_due_account }}</x-td>
            <x-td>{{ $position }}</x-td>
            <x-td>{{ $voter->number_of_past_due_account }}</x-td>
        </tr>
    @endforeach
    </tbody>
</table>
