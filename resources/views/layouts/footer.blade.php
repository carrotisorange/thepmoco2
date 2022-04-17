<footer class="px-4 dark:bg-coolGray-800 dark:text-coolGray-400">
    <div class="container flex flex-wrap items-center justify-center mx-auto space-y-4 sm:justify-between sm:space-y-0">
        <div class="flex flex-row pr-3 space-x-4 sm:space-x-8">

            <ul class="flex flex-wrap items-center space-x-4 sm:space-x-8">
                @include('websites.terms-of-use')
                @include('websites.privacy-policy')
                <li>
                    <x-button data-modal-toggle="terms-and-use"><i class="fa-solid fa-file"></i>&nbspTerms of Use</x-button>
                    {{-- <a rel="noopener noreferrer" href="terms-of-use">Terms of Use</a> --}}
                </li>
                <li>
                  
                  <x-button data-modal-toggle="privacy-policy"><i class="fa-solid fa-masks-theater"></i>&nbspPrivacy Policy</x-button>
                    {{-- <a rel="noopener noreferrer" href="privacy">Privacy</a> --}}
                </li>
            </ul>
        </div>
        <ul class="flex flex-wrap pl-3 space-x-4 sm:space-x-8">
            <li>
                <a title="Follow us on Instagram" target="_blank" rel="noopener noreferrer"
                    href="https://www.instagram.com/onlinepropertymanager/"><i class="fa-brands fa-2x fa-instagram"></i></a>
            </li>
            <li>
                <a title="Like and Follow us on Facebook" target="_blank" rel="noopener noreferrer"
                    href="https://www.facebook.com/onlinepropertymanager"><i class="fa-brands fa-2x fa-facebook"></i></a>
            </li>
            {{-- <li>
                <a title="Follow us on Twitter" target="_blank" rel="noopener noreferrer"><i
                        class="fa-brands fa-twitter"></i></a>
            </li> --}}
        </ul>

        <a class="text-gray-600 font-semibold" href="#/">© 2021 Copyright</a>
    </div>


</footer>