<div class="pt-4 pb-1 border-t border-gray-200 overflow-y-auto h-screen pb-20">
  @foreach(App\Models\UserRestriction::where('user_id',auth()->user()->id)->where('property_uuid', Session::get('property_uuid'))->where('restriction_id', 2)->where('is_approved',1)->groupBy('feature_id')->orderBy('feature_id', 'asc')->get() as $feature)
    <div class="pt-2 pb-3 space-y-1">
      @if($feature->feature->is_active)
        @if(Session::get('property_uuid'))
        <x-dropdown-link
            href="/property/{{ Session::get('property_uuid') }}/bill/{{ 'property' }}/{{ Session::get('property_uuid') }}">
            {{ $feature->feature->feature }}
        </x-dropdown-link>
        @else
        <x-dropdown-link href="/property/">
            {{ $feature->feature->feature }}
        </x-dropdown-link>

        @endif
        @endif
    </div>
    @endforeach
    
    <div class="pt-2 pb-3 space-y-1">
        @if(Session::get('property_uuid'))
        <x-dropdown-link href="/user/{{ Auth::user()->username }}/edit">
            Profile
        </x-dropdown-link>
        @else
        <x-dropdown-link href="/property/">
            Profile
        </x-dropdown-link>
        @endif

    </div>

    @if(auth()->user()->role_id != 7 && auth()->user()->role_id != 8)
    <div class="pt-2 pb-3 space-y-1">
        <x-dropdown-link href="/user/{{ Auth::user()->username }}/subscriptions">
            Subscriptions
        </x-dropdown-link>
    </div>
    @endif
    <div class="pt-2 pb-3 space-y-1">
        <x-dropdown-link href="/property">
            Portfolio
        </x-dropdown-link>
    </div>

    <div class="pt-2 pb-3 space-y-1">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                Log Out
            </x-dropdown-link>
        </form>
    </div>
</div>