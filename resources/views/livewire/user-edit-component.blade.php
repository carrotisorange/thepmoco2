<div>
    @section('title', $user->name)
    @include('layouts.notifications')
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        
                    </p>
                </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">

                @include('forms.user-edit')

            </div>
        </div>
    </div>

</div>