@if($units->count())
<span class="font-bold">Details</span>
@endif
<p class="text-left">
    @foreach($units as $info)
<div class="mt-8">
    <table class="w-3/4 divide-y divide-gray-200">
        <tbody>
            <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Unit:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">{{ $info->unit }}</td>
            </tr>
            <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Category:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                    $info->category->category }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Enrolled in leasing:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">
                    @if($info->is_enrolled === 1)
                    Enrolled
                    @else
                    Unenrolled
                    @endif
                </td>
            </tr>
            {{-- <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Building:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                    $info->building->building }}
                </td>
            </tr> --}}
            <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Floor:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">{{ $info->floor->floor
                    }}</td>
            </tr>
            <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                    $info->status->status }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Rent:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">₱{{
                    number_format($info->rent, 2) }}</td>
            </tr>
            <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Discount:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">₱{{
                    number_format($info->discount, 2) }}</td>
            </tr>
            <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Size:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                    number_format($info->suze, 2) }} sqm</td>
            </tr>
            <tr>
                <th scope="col" class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Created:</th>
                <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                    $info->created_at->diffForHumans() }}
                </td>
            </tr>

        </tbody>
    </table>

</div>
<div class="mt-8">
    <hr>
</div>
@endforeach
</p>