<div>
    @section('title', $user->name)
    @include('layouts.notifications')
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-12 md:mt-0">

                @include('forms.users.user-edit')

            </div>
        </div>
    </div>

</div>