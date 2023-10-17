@extends('layouts.export')
@section('title', 'Eligible Voters')
@section('content')
<p>
    Election Date: {{ Carbon\Carbon::parse($election->date_of_election)->format('M d, Y') }}
</p>

<p>
    Time Limit: {{ $election->time_limit }} hr/s
</p>

<p>
    Is Proxy Voting Allowed?: {{ $election->is_proxy_voting_allowed }}
</p>

<p>
   Policies: {{ $election->other_policies }}
</p>

<p>
    Total Number of Eligible Voters: {{ $voters->count() }}
</p>
<br>
<p>
    List of Eligible Voters
</p>

<p>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <tr>
       <x-th>#</x-th>
        <x-th>Name</x-th>
        <x-th>House</x-th>
        <x-th>Member since</x-th>

    </tr>
  @foreach($voters as $index => $voter)
    <?php
        $house = App\Models\House::find(App\Models\HouseOwnership::where('house_owner_id',$voter->house_owner_id)->pluck('house_id')->first())->house;
    ;?>
    <tr>
        <x-th>{{ $index+1 }}</x-th>
        <x-td>{{ $voter->houseOwner->house_owner }}</x-td>
        <x-td>{{ $house }}</x-td>
        <x-td>{{ Carbon\Carbon::parse($voter->created_at)->format('Y') }}</x-td>
    </tr>

    @endforeach

</table>
</p>
@endsection
