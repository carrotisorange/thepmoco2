<nav aria-label="Sidebar" class="hidden md:block md:flex-shrink-0 md:bg-white overflow-auto h-screen pb-32">
    <div class="relative flex w-22 flex-col space-y-3 p-3">
        {{-- @foreach(App\Models\Feature::where('is_active',1)->get() as $feature->feature) --}}
        @foreach(App\Models\UserRestriction::where('user_id',auth()->user()->id)->where('restriction_id', 2)->where('is_approved',1)->get() as $feature)
            @if($feature->feature->is_active)
                @if(Session::get('property_uuid'))
                    @if($feature->id === 11)
                        <x-nav-link href="/property/{{ Session::get('property_uuid') }}/bill/{{ 'property' }}/{{ Session::get('property_uuid') }}" :active="request()->routeIs($feature->feature->alias)">
                            <span class="sr-only">{{ $feature->feature->feature }}</span>
                            <img class="h-8 w-auto" src="{{ asset('/brands/'.$feature->feature->default_icon) }}" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </x-nav-link>
                    @elseif($feature->id === 12)
                        <x-nav-link href="/property/{{ Session::get('property_uuid') }}/collection/{{ 'property' }}/{{ Session::get('property_uuid') }}" :active="request()->routeIs($feature->feature->alias)">
                            <span class="sr-only">{{ $feature->feature->feature }}</span>
                            <img class="h-8 w-auto" src="{{ asset('/brands/'.$feature->feature->default_icon) }}" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </x-nav-link>
                    @else
                        <x-nav-link href="/property/{{ Session::get('property_uuid') }}/{{ $feature->feature->alias }}" :active="request()->routeIs($feature->feature->alias)">
                            <span class="sr-only">{{ $feature->feature->feature }}</span>
                            <img class="h-8 w-auto" src="{{ asset('/brands/'.$feature->feature->default_icon) }}" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </x-nav-link>
                    @endif

                 
                <div class="font-medium leading-3 ml-0 text-xs text-gray-900 mt-10">{{ $feature->feature->feature }}</div>
                @else
                <x-nav-link href="/property/" :active="request()->routeIs($feature->feature->alias)">
                    <span class="sr-only">Collections</span>
                    <img class="h-8 w-auto" src="{{ asset('/brands/'.$feature->feature->default_icon) }}" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </x-nav-link> 
                @endif
            @endif
        @endforeach
    </div>
</nav>