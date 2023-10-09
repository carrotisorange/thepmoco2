<x-new-layout-base>
    @section('title', 'Verify Email | '. env('APP_NAME'))

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 mt-5">
            <div class=" flex items-center justify-center">
                <img class="h-56 w-auto" src="{{ asset('/brands/thanks.png') }}">
            </div>
            <h2 class="pt-3 pb-5 text-center text-2xl font-bold tracking-tight text-gray-900 font-pop">Thanks
                for signing up!</h2>
            <p class="text-center text-md font-medium text-medium text-gray-700">Your journey with The Property
                Manager Online starts when you</p>
            <p class="text-center text-md font-medium text-medium text-gray-700">verify your email by clicking
                the link we sent you.</p>
            </p>



            <p class="mt-5 text-center text-md font-normal text-gray-500">If you did not receive an email, click
                on the resend button below.

            </p>


            <div class="mt-5 flex items-center justify-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-button type="submit">
                            Resend verification email
                        </x-button>
                    </div>
                </form>




            </div>


        </div>

        @if (session('status') == 'verification-link-sent')
        <p class="mt-5 text-center text-sm font-normal text-green-500">
            A new verification link has been sent to the email address you provided during
            registration.
        </p>
        @endif
    </div>
    </x-newlayout-base>
