<?php $availableFeatures = App\Models\UserRestriction::where('user_id',auth()->user()->id)
->where('property_uuid', Session::get('property_uuid'))
->where('restriction_id', 2)->where('is_approved',1)
->groupBy('feature_id')
->orderBy('feature_id')
->get(); ?>
<nav aria-label="Sidebar" class="hidden md:block md:flex-shrink-0 md:bg-white overflow-auto h-screen pb-32 text-center">
    <div class="relative flex w-22 flex-col space-y-3 p-3 text-center items-center">
        @foreach($availableFeatures as $feature)
            @if($feature->feature->is_active)
                @if(Session::get('property_uuid'))
                    <?php $routeToTheFeature = '/property/'.Session::get('property_uuid').'/'.$feature->feature->alias; ?>
                @else
                    <?php $routeToTheFeature = '/property/'; ?>
                @endif

                <x-nav-link href="{{ $routeToTheFeature }}" :active="request()->routeIs($feature->feature->alias)">
                    <span class="sr-only">{{ $feature->feature->feature }}</span>
                    <img title="{{ $feature->feature->feature }}" class="h-8 w-auto" src="{{ asset('/brands/'.$feature->feature->icon) }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </x-nav-link>

                <p class="font-medium text-xs text-gray-900 mt-10 text-center">
                    {{ $feature->feature->feature }}
                </p>
            @endif
        @endforeach
    </div>
</nav>
