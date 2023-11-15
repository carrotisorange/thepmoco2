<?php $name = auth()->user()->name;
    $firstName = explode(" ",$name);
?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="px-10">
    <div class="pt-10 block lg:flex justify-between">
        <div class="w-full inline-flex">
            <h1 class="text-4xl font-bold">Dashboard</h1>
        </div>
        <!-- notifications -->
        <div class="flex w-full">
            <style>
            .animated {
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }

            .animated.faster {
                -webkit-animation-duration: 500ms;
                animation-duration: 500ms;
            }

            .fadeIn {
                -webkit-animation-name: fadeIn;
                animation-name: fadeIn;
            }

            .fadeOut {
                -webkit-animation-name: fadeOut;
                animation-name: fadeOut;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                }
            }
            </style>

            <div>
                <button onclick="openModal()" class='p-2 mt-2 border border-4 border-purple-500 bg-transparent text-purple-500 hover:bg-purple-500 hover:text-white rounded text-base'><img class="inline-flex" width="26" height="26" src="https://img.icons8.com/metro/26/9061f9/appointment-reminders.png" alt="appointment-reminders"/> See Notifications</button>
            </div>

            <div class="main-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
                style="background: rgba(0,0,0,.7);">
                <div
                    class="border border-teal-500 shadow-lg modal-container bg-white mx-auto rounded shadow-lg z-50">
                    <div class="modal-content py-4 text-left px-6">
                        <!--Title-->
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-base font-medium">Notifications</p>
                            <div class="modal-close cursor-pointer z-50">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <!--Body-->
                        <div class="my-5">
          
                            <div x-data="{ openTab: 1 }" class="">
                                <div class="mx-auto">
                                    <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
                                        <button x-on:click="openTab = 1" :class="{ 'bg-purple-600 text-white': openTab === 1 }" class="flex-1 p-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-all duration-300 text-sm">Expiring Contracts</button>
                                        <button x-on:click="openTab = 2" :class="{ 'bg-purple-600 text-white': openTab === 2 }" class="flex-1 p-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-all duration-300 text-sm">Payment Requests</button>
                                        <button x-on:click="openTab = 3" :class="{ 'bg-purple-600 text-white': openTab === 3 }" class="flex-1 p-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-all duration-300 text-sm">Moveout Requests</button>
                                        <button x-on:click="openTab = 4" :class="{ 'bg-purple-600 text-white': openTab === 4 }" class="flex-1 p-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-all duration-300 text-sm">Concerns</button>
                                    </div>

                                    <div x-show="openTab === 1" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-purple-600">
                                        <div class="flex justify-between py-2">
                                            <h1 class="py-1 font-light text-sm">Total Expiring Contracts:</h1>
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                                                12
                                                
                                            </span>
                                        </div>
                                        
                                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                                            <!-- limit list to 5 -->
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            November 14, 2023
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            November 14, 2023
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            November 14, 2023
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            November 14, 2023
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            November 14, 2023
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="flex justify-end items-center pt-5">
                                            <!-- Button -->
                                            <button
                                                class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                type="button">
                                                See all Contracts
                                            </button>
                                        </div>
                                    </div>

                                    <div x-show="openTab === 2" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-purple-600">
                                        <div class="flex justify-between py-2">
                                            <h1 class="py-1 font-light text-sm">Total Pending Payments:</h1>
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                                                12
                                                
                                            </span>
                                        </div>
                                        
                                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                                            <!-- limit list to 5 -->
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Payment Amount: 5678
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Payment Amount: 5678
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Payment Amount: 5678
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Payment Amount: 5678
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Tenant Name
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Payment Amount: 5678
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>   
                                        <div class="flex justify-end items-center pt-5">
                                            <!-- Button -->
                                            <button
                                                class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                type="button">
                                                See all Payment Requests
                                            </button>
                                        </div> 
                                    </div>

                                    <div x-show="openTab === 3" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-purple-600">
                                        <div class="flex justify-between py-2">
                                            <h1 class="py-1 font-light text-sm">Total Moveout Requests:</h1>
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                                                18
                                                
                                            </span>
                                        </div>
                                        
                                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                                            <!-- limit list to 5 -->
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Contract Duration:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Contract Duration:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Contract Duration:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Contract Duration:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Contract Duration:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="flex justify-end items-center pt-5">
                                            <!-- Button -->
                                            <button
                                                class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                type="button">
                                                See all Moveout Requests
                                            </button>
                                        </div>
                                    </div>

                                    <div x-show="openTab === 4" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-purple-600">
                                    <div class="flex justify-between py-2">
                                            <h1 class="py-1 font-light text-sm">Total Pending Concerns:</h1>
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                                                12
                                                
                                            </span>
                                        </div>
                                        
                                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                                            <!-- limit list to 5 -->
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Concern Category:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Concern Category:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Concern Category:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Concern Category:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            Neil Sims
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Concern Category:
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="flex justify-end items-center pt-5">
                                            <!-- Button -->
                                            <button
                                                class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                type="button">
                                                See all Concerns
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
                         </div>
                        
                    </div>
                </div>
            </div>

            <script>
                const modal = document.querySelector('.main-modal');
                const closeButton = document.querySelectorAll('.modal-close');

                const modalClose = () => {
                    modal.classList.remove('fadeIn');
                    modal.classList.add('fadeOut');
                    setTimeout(() => {
                        modal.style.display = 'none';
                    }, 500);
                }

                const openModal = () => {
                    modal.classList.remove('fadeOut');
                    modal.classList.add('fadeIn');
                    modal.style.display = 'flex';
                }

                for (let i = 0; i < closeButton.length; i++) {

                    const elements = closeButton[i];

                    elements.onclick = (e) => modalClose();

                    modal.style.display = 'none';

                    window.onclick = function (event) {
                        if (event.target == modal) modalClose();
                    }
                }
            </script>
        </div>
        <!-- number of buildings -->
        <div class="w-full bg-white rounded-lg shadow p-3 md:p-6 justify-end">
            <div class="flex justify-between pb-0 lg:pb- mb-4">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                        <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/building.png"
                            alt="building" />
                    </div>
                    <div>
                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Buildings</p>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
        <!-- number of personnels -->
        <div class="w-full bg-white rounded-lg shadow p-3 md:p-6 justify-end">
            <div class="grid grid-cols-3 gap-3 mb-2">
                <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt
                        class="w-8 h-8 rounded-full bg-purple-400 text-sm font-medium flex items-center justify-center mb-1">
                        12</dt>
                    <dd class="text-sm font-medium">Personnels</dd>
                </dl>
                <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt
                        class="w-8 h-8 rounded-full bg-purple-100 text-sm font-medium flex items-center justify-center mb-1">
                        12</dt>
                    <dd class="text-sm font-medium">Current</dd>
                </dl>
                <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt
                        class="w-8 h-8 rounded-full bg-purple-200 text-sm font-medium flex items-center justify-center mb-1">
                        12</dt>
                    <dd class="text-sm font-medium ">Verified Users</dd>
                </dl>
            </div>
        </div>

    </div>

    <div class="mt-8 grid grid-cols-4">

        <!-- number of contracts -->
        <div class="w-full col-span-4 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                    <div class="flex pb-4 mb-4">
                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/paper.png"
                                    alt="paper" />
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Contracts</p>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-2">
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-green-400 text-sm font-medium flex items-center justify-center mb-1">
                                12</dt>
                            <dd class="text-sm font-medium">Current Tenants</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-green-100 text-sm font-medium flex items-center justify-center mb-1">
                                12</dt>
                            <dd class="text-sm font-medium">Past Tenants</dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>

        <!-- number of tenants -->
        <div class="w-full col-span-4 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                    <div class="flex pb-4 mb-4">
                        <div class="flex justify-between">
                            <div
                                class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/name.png"
                                    alt="name" />
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Tenants</p>
                            </div>

                            <div>
                                <svg data-popover-target="verified-info" data-popover-placement="bottom"
                                    class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                </svg>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-2">
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-yellow-400 text-sm font-medium flex items-center justify-center mb-1">
                                12</dt>
                            <dd class="text-sm font-medium">Verifed</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-yellow-100 text-sm font-medium flex items-center justify-center mb-1">
                                12</dt>
                            <dd class="text-sm font-medium">Unverified</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- number of units -->
        <div class="w-full col-span-4 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                    <div class="flex pb-4 mb-4">
                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/door.png"
                                    alt="door" />
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Units</p>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3 mb-2">
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-indigo-400 text-sm font-medium flex items-center justify-center mb-1">
                                12</dt>
                            <dd class="text-sm font-medium">Occupied</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-indigo-200 text-sm font-medium flex items-center justify-center mb-1">
                                12</dt>
                            <dd class="text-sm font-medium">Vacant</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-indigo-100 text-sm font-medium flex items-center justify-center mb-1">
                                12</dt>
                            <dd class="text-sm font-medium">Maintenance</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- number of owners -->
        <div class="w-full col-span-4 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                    <div class="flex  pb-4 mb-4">
                        <div class="flex justify-between">
                            <div
                                class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/caretaker.png"
                                    alt="caretaker" />
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Owners</p>
                            </div>
                            <div>
                                <svg data-popover-target="verified-info" data-popover-placement="bottom"
                                    class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                </svg>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-2">
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-gray-300 text-sm font-medium flex items-center justify-center mb-1">
                                12</dt>
                            <dd class="text-sm font-medium">Verifed</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-gray-100 text-sm font-medium flex items-center justify-center mb-1">
                                12</dt>
                            <dd class="text-sm font-medium">Unverified</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- second row -->
    <div class="mt-10 grid grid-cols-4">
        <!-- occupancy rate -->
        <div class="col-span-4 lg:col-span-2">
            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                <div class="flex justify-between mb-3">
                    <div class="flex justify-center items-center">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Occupancy Rate
                        </h5>
                        
                        
                    </div>
                
                </div>

                <!-- Donut Chart -->
                <div class="py-6" id="donut-chart"></div>

                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
                                </li>

                                
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                // ApexCharts options and config
            window.addEventListener("load", function() {
                const getChartOptions = () => {
                    return {
                    series: [35.1, 23.5, 2.4, 5.4],
                    colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                    chart: {
                        height: 320,
                        width: "100%",
                        type: "donut",
                    },
                    stroke: {
                        colors: ["transparent"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                        donut: {
                            labels: {
                            show: true,
                            name: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: 20,
                            },
                            total: {
                                showAlways: true,
                                show: true,
                                label: "Occupancy Rate",
                                fontFamily: "Inter, sans-serif",
                                formatter: function (w) {
                                const sum = w.globals.seriesTotals.reduce((a, b) => {
                                    return a + b
                                }, 0)
                                return `${sum}k`
                                },
                            },
                            value: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: -20,
                                formatter: function (value) {
                                return value + "k"
                                },
                            },
                            },
                            size: "80%",
                        },
                        },
                    },
                    grid: {
                        padding: {
                        top: -2,
                        },
                    },
                    labels: ["Occupied", "Vacant", "Reserved", "Under Maintenance"],
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                        formatter: function (value) {
                            return value + "k"
                        },
                        },
                    },
                    xaxis: {
                        labels: {
                        formatter: function (value) {
                            return value  + "k"
                        },
                        },
                        axisTicks: {
                        show: false,
                        },
                        axisBorder: {
                        show: false,
                        },
                    },
                    }
                }

                if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
                    chart.render();

                    // Get all the checkboxes by their class name
                    const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

                    // Function to handle the checkbox change event
                    function handleCheckboxChange(event, chart) {
                        const checkbox = event.target;
                        if (checkbox.checked) {
                            switch(checkbox.value) {
                            case 'desktop':
                                chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
                                break;
                            case 'tablet':
                                chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
                                break;
                            case 'mobile':
                                chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
                                break;
                            default:
                                chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
                            }

                        } else {
                            chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
                        }
                    }

                    // Attach the event listener to each checkbox
                    checkboxes.forEach((checkbox) => {
                        checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
                    });
                }
            });
            </script>


        </div>

        <!-- guests -->
        <div class="col-span-4 lg:col-span-2 p-4">
            <div class="flex justify-between">
                <h1 class="py-3 font-bold text-xl">Total Guests Welcomed</h1>
                <p class="p-3 text-xl font-semibold">12</p>
            </div>
            <div class="flex justify-between py-2">
                <h1 class="py-1 font-light text-sm">Average Number of Days Stayed:</h1>
                <span
                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">

                    42.5% day/s
                </span>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                <li class="pb-3 sm:pb-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Neil Sims
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <a href=""><img width="26" height="26"
                                    src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Bonnie Green
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <a href=""><img width="26" height="26"
                                    src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Michael Gough
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <a href=""><img width="26" height="26"
                                    src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Thomas Lean
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <a href=""><img width="26" height="26"
                                    src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                        </div>
                    </div>
                </li>
                <li class="pt-3 pb-0 sm:pt-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Lana Byrd
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <a href=""><img width="26" height="26"
                                    src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward" /></a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="flex justify-end items-center pt-5">
                <!-- Button -->
                <button
                    class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    See all Guests
                </button>
            </div>

        </div>

        
    </div>
    <div class="mt-7 grid grid-cols-6">
        <!-- income rate -->
        <div class="col-span-6 lg:col-span-2">
            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                    <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Income</dt>
                        <dd class="leading-none text-3xl font-bold text-gray-900 dark:text-white">₱5,405</dd>
                    </dl>                   
                </div>

                <div class="grid grid-cols-2 py-3">
                    <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Collection</dt>
                        <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">₱23,635</dd>
                    </dl>
                    <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Expense</dt>
                        <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500">-₱18,230</dd>
                    </dl>
                </div>

                <div id="bar-chart"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
                                </li>

                                
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                // ApexCharts options and config
            window.addEventListener("load", function() {
                var options = {
                series: [
                    {
                    name: "Collection",
                    color: "#2D3047",
                    data: ["1420", "1620", "1820", "1420", "1650", "2120"],
                    },
                    {
                    name: "Expense",
                    data: ["788", "810", "866", "788", "1100", "1200"],
                    color: "#93B7BE",
                    }
                ],
                chart: {
                    sparkline: {
                    enabled: false,
                    },
                    type: "bar",
                    width: "100%",
                    height: 400,
                    toolbar: {
                    show: false,
                    }
                },
                fill: {
                    opacity: 1,
                },
                plotOptions: {
                    bar: {
                    horizontal: true,
                    columnWidth: "100%",
                    borderRadiusApplication: "end",
                    borderRadius: 6,
                    dataLabels: {
                        position: "top",
                    },
                    },
                },
                legend: {
                    show: true,
                    position: "bottom",
                },
                dataLabels: {
                    enabled: false,
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    formatter: function (value) {
                    return "₱" + value
                    }
                },
                xaxis: {
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                    formatter: function(value) {
                        return "₱" + value
                    }
                    },
                    categories: ["Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    axisTicks: {
                    show: false,
                    },
                    axisBorder: {
                    show: false,
                    },
                },
                yaxis: {
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                    }
                },
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                    left: 2,
                    right: 2,
                    top: -20
                    },
                },
                fill: {
                    opacity: 1,
                }
                }

                if(document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("bar-chart"), options);
                chart.render();
                }
            });
            </script>

        </div>

        <!-- collection rate -->
        <div class="col-span-6 lg:col-span-4">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                            <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/coins.png"
                                alt="coins" />
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">15%</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Collection Rate</p>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <dl class="flex items-center">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Total Billed:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">6</dd>
                    </dl>
                    <dl class="flex items-center justify-end">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Total Unbilled:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">6</dd>
                    </dl>
                </div>

                <div class="grid grid-cols-2">
                    <dl class="flex items-center">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Total Collected:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">6</dd>
                    </dl>
                    <dl class="flex items-center justify-end">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Total Uncollected:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">12334</dd>
                    </dl>
                </div>

                <div id="collection-chart"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-end items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
                                </li>

                                
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                // ApexCharts options and config
            window.addEventListener("load", function() {
                const options = {
                    colors: ["#1A56DB", "#b4c4ae"],
                    series: [
                        {
                        name: "Billed",
                        color: "#5d5179",
                        data: [
                            { x: "Jan", y: 231 },
                            { x: "Feb", y: 122 },
                            { x: "Mar", y: 63 },
                            { x: "Apr", y: 421 },
                            { x: "May", y: 122 },
                            { x: "Jun", y: 323 },
                            { x: "Jul", y: 111 },
                        ],
                        },
                        {
                        name: "Unbilled",
                        color: "#C6ABFD",
                        data: [
                            { x: "Jan", y: 100 },
                            { x: "Feb", y: 130 },
                            { x: "Mar", y: 80 },
                            { x: "Apr", y: 300 },
                            { x: "May", y: 90 },
                            { x: "Jun", y: 222 },
                            { x: "Jul", y: 279 },
                        ],
                        },
                        {
                        name: "Collected",
                        color: "#AD84F3",
                        data: [
                            { x: "Jan", y: 200 },
                            { x: "Feb", y: 180 },
                            { x: "Mar", y: 50 },
                            { x: "Apr", y: 300 },
                            { x: "May", y: 120 },
                            { x: "Jun", y: 70 },
                            { x: "Jul", y: 300 },
                        ],
                        },
                        {
                        name: "Uncollected",
                        color: "#A5A5A5",
                        data: [
                            { x: "Jan", y: 123 },
                            { x: "Feb", y: 40 },
                            { x: "Mar", y: 20 },
                            { x: "Apr", y: 222 },
                            { x: "May", y: 300 },
                            { x: "Jun", y: 32 },
                            { x: "Jul", y: 11 },
                        ],
                        },
                    ],
                    chart: {
                        type: "bar",
                        height: "320px",
                        fontFamily: "Inter, sans-serif",
                        toolbar: {
                        show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                        },
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        style: {
                        fontFamily: "Inter, sans-serif",
                        },
                    },
                    states: {
                        hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                        },
                    },
                    stroke: {
                        show: true,
                        width: 0,
                        colors: ["transparent"],
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                        left: 2,
                        right: 2,
                        top: -14
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    xaxis: {
                        floating: false,
                        labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                        },
                        axisBorder: {
                        show: false,
                        },
                        axisTicks: {
                        show: false,
                        },
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1,
                    },
                    }

                    var chart = new ApexCharts(document.getElementById("collection-chart"), options);
            chart.render();


            });
            </script>

        </div>

        <!-- bills -->
        <div class="mt-5 col-span-6 lg:col-span-3">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                <div class="flex justify-between items-start w-full">
                    <div class="flex-col items-center">
                        <div class="flex items-center mb-1">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mr-1">Bills</h5>
                            <svg data-popover-target="verified-info" data-popover-placement="bottom"
                                class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                            </svg>
                            <div data-popover id="verified-info" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Verified
                                </h3>
                                <p>are those users who have access to their portals and have verified their email addresses. </p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Unverified</h3>
                                <p>are those users who have been given access to their portals via emails but haven't verified their email address yet.</p>
                                
                            </div>
                                <div data-popper-arrow></div>
                            </div>
                        </div>
                        
                        
                    </div>

                </div>

                <!-- Line Chart -->
                <div class="py-6" id="pie-chart"></div>

                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
                                </li>

                                
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                // ApexCharts options and config
            window.addEventListener("load", function() {
            const getChartOptions = () => {
                return {
                    series: [52.8, 26.8, 20.4],
                    colors: ["#93B7BE", "#E0CA3C", "#AB4B4B"],
                    chart: {
                    height: 420,
                    width: "100%",
                    type: "pie",
                    },
                    stroke: {
                    colors: ["white"],
                    lineCap: "",
                    },
                    plotOptions: {
                    pie: {
                        labels: {
                        show: true,
                        },
                        size: "100%",
                        dataLabels: {
                        offset: -25
                        }
                    },
                    },
                    labels: ["All Bills", "Paid", "Unpaid"],
                    dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                    },
                    legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                    labels: {
                        formatter: function (value) {
                        return value + "%"
                        },
                    },
                    },
                    xaxis: {
                    labels: {
                        formatter: function (value) {
                        return value  + "%"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    },
                }
                }

                if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
                chart.render();
                }
            });
            </script>


        </div>

        <!-- delinquents -->
        <div class="col-span-6 lg:col-span-3 p-4">
            <div class="flex justify-between">
                <h1 class="py-3 font-bold text-2xl">Delinquents</h1>
                <span
                    class="text-red-800 text-lg font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                    18
                                                
                </span>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                <li class="pb-3 sm:pb-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Neil Sims
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            ₱320
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Bonnie Green
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            $3467
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Michael Gough
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            ₱67
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Thomas Lean
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            ₱2367
                        </div>
                    </div>
                </li>
                <li class="pt-3 pb-0 sm:pt-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Lana Byrd
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            ₱367
                        </div>
                    </div>
                </li>
            </ul>

            <div class="flex justify-end items-center pt-5">
                <!-- Button -->
                <button
                    class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    See all Bills
                </button>
            </div>

        </div>

    </div>




    <!-- fourth row -->

    <div class="mt-10 grid grid-cols-4">

        <!-- water consumption -->
        <div class="col-span-4 lg:col-span-2">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800">
                <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">1234</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Total Water Consumption</p>
                    </div>
                   
                </div>
                <div id="waters-chart" class="px-2.5"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
                                </li>

                                
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                // ApexCharts options and config
            window.addEventListener("load", function() {
                let options = {
                // set the labels option to true to show the labels on the X and Y axis
                xaxis: {
                    show: true,
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                    },
                    axisBorder: {
                    show: false,
                    },
                    axisTicks: {
                    show: false,
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                    formatter: function (value) {
                        return value;
                    }
                    }
                },
                series: [
                    {
                    name: "Water Consumption",
                    data: [150, 141, 145, 152, 135, 125],
                    color: "#1A56DB",
                    },

                ],
                chart: {
                    sparkline: {
                    enabled: false
                    },
                    height: "100%",
                    width: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                    enabled: false,
                    },
                    toolbar: {
                    show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                    show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false,
                },
                }

                if (document.getElementById("waters-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("waters-chart"), options);
                chart.render();
                }
            });
            </script>

        </div>

        <!-- electricity -->
        <div class="col-span-4 lg:col-span-2">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800">
                <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">1234</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Total Water Consumption</p>
                    </div>
                </div>
                <div id="electric-chart" class="px-2.5"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
                                </li>

                                
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                // ApexCharts options and config
            window.addEventListener("load", function() {
                let options = {
                // set the labels option to true to show the labels on the X and Y axis
                xaxis: {
                    show: true,
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                    },
                    axisBorder: {
                    show: false,
                    },
                    axisTicks: {
                    show: false,
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                    formatter: function (value) {
                        return value;
                    }
                    }
                },
                series: [
                    {
                    name: "Electricity Consumption",
                    data: [150, 141, 145, 152, 135, 125],
                    color: "#ffba08",
                    },

                ],
                chart: {
                    sparkline: {
                    enabled: false
                    },
                    height: "100%",
                    width: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                    enabled: false,
                    },
                    toolbar: {
                    show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                    show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false,
                },
                }

                if (document.getElementById("electric-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("electric-chart"), options);
                chart.render();
                }
            });
            </script>

        </div>


    </div>
    <!-- fourth row row -->

    <div class="mt-10 grid grid-cols-6">
        <!-- concerns -->
        <div class="col-span-6 lg:col-span-3 p-4">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">15</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Concerns</p>
                        </div>
                        
                    </div>
                    <div>
                    
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">15</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Concerns Resolved</p>
                        
                    </div>
                    <div>
                    
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">15</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">All time Concerns</p>
                        
                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <dl class="flex items-center">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Resolved Concerns:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">6</dd>
                    </dl>
                    <dl class="flex items-center justify-end">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Average days to be
                            resolved:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">1 day/s</dd>
                    </dl>
                </div>

                <div id="column-chart"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
                                </li>

                                
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                // ApexCharts options and config
            window.addEventListener("load", function() {
                const options = {
                    colors: ["#1A56DB", "#FDBA8C"],
                    series: [
                        {
                        name: "Concern",
                        color: "#93C6D6",
                        data: [
                            { x: "Mon", y: 231 },
                            { x: "Tue", y: 122 },
                            { x: "Wed", y: 63 },
                            { x: "Thu", y: 421 },
                            { x: "Fri", y: 122 },
                            { x: "Sat", y: 323 },
                            { x: "Sun", y: 111 },
                        ],
                        },
                        {
                        name: "Resolved",
                        color: "#9E8FB2",
                        data: [
                            { x: "Mon", y: 232 },
                            { x: "Tue", y: 113 },
                            { x: "Wed", y: 341 },
                            { x: "Thu", y: 224 },
                            { x: "Fri", y: 522 },
                            { x: "Sat", y: 411 },
                            { x: "Sun", y: 243 },
                        ],
                        },
                    ],
                    chart: {
                        type: "bar",
                        height: "320px",
                        fontFamily: "Inter, sans-serif",
                        toolbar: {
                        show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                        },
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        style: {
                        fontFamily: "Inter, sans-serif",
                        },
                    },
                    states: {
                        hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                        },
                    },
                    stroke: {
                        show: true,
                        width: 0,
                        colors: ["transparent"],
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                        left: 2,
                        right: 2,
                        top: -14
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    xaxis: {
                        floating: false,
                        labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                        },
                        axisBorder: {
                        show: false,
                        },
                        axisTicks: {
                        show: false,
                        },
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1,
                    },
                    }

                    var chart = new ApexCharts(document.getElementById("column-chart"), options);
            chart.render();


            });
            </script>

        </div>

        <!-- election -->
        <div class="col-span-6 lg:col-span-3 p-4">
            <!-- memos -->
            <div class="w-full bg-white rounded-lg shadow p-3 md:p-6 justify-end">
                <div class="flex justify-between pb-0 lg:pb- mb-4">
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26"
                                viewBox="0 0 26 26" style="fill:#737373;">
                                <path
                                    d="M 20.265625 4.207031 C 20.023438 3.96875 19.773438 3.722656 19.527344 3.476563 C 19.277344 3.230469 19.035156 2.980469 18.792969 2.734375 C 17.082031 0.988281 16.0625 0 15 0 L 7 0 C 4.796875 0 3 1.796875 3 4 L 3 22 C 3 24.203125 4.796875 26 7 26 L 19 26 C 21.203125 26 23 24.203125 23 22 L 23 8 C 23 6.9375 22.011719 5.917969 20.265625 4.207031 Z M 21 22 C 21 23.105469 20.105469 24 19 24 L 7 24 C 5.894531 24 5 23.105469 5 22 L 5 4 C 5 2.894531 5.894531 2 7 2 L 14.289063 1.996094 C 15.011719 2.179688 15 3.066406 15 3.953125 L 15 7 C 15 7.550781 15.449219 8 16 8 L 19 8 C 19.996094 8 21 8.003906 21 9 Z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Memos</p>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
    
            <div class="flex justify-between">
                <h1 class="py-3 font-bold text-xl">Election Date</h1>
                <p class="p-3 text-lg font-medium">October 23, 2023</p>
            </div>
            <div class="flex justify-between py-2">
                <h1 class="py-1 font-light text-base">Current BODS:</h1>
                <span
                    class="bg-green-100 text-green-800 text-base font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                    5                        
                </span>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                <!-- limit to 5 only -->
                <li class="pb-3 sm:pb-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Neil Sims
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Bonnie Green
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Michael Gough
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Thomas Lean
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                    </div>
                </li>
                <li class="pt-3 pb-0 sm:pt-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Lana Byrd
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                            </p>
                        </div>
                    </div>
                </li>
            </ul>


        </div>
        

    </div>
    <!-- fifth row row -->

    <div class="mt-10 grid grid-cols-6">
        
        
    </div>

    <!-- fifth row end -->
</div>

<!-- end of new dashboard-->
{{--
<div>

    <div class="h-full pb-36">
        <div class=" fixed w-1/2 bg-gray-50" aria-hidden="true"></div>
        <div class=" fixed min-h-screen right-1 w-1/3 lg:bg-gradient-to-r from-purple-400 to-gray-400  sm:bg-gray-50"
            aria-hidden="true"></div>

        <div class="relative flex min-h-screen flex-col">
            <div class="mt-5  lg:px-1">
                <div class="mt-1 flex items-end justify-end">

                    <div class="mx-10 m-5 grid sm:grid-cols-1 gap-x-4 lg:grid-cols-6">
                        <div class="col-span-3">
                            <h1 class="text-left text-xl font-bold tracking-tight sm:text-xl lg:text-2xl">

                                <span class="block  font-semibold text-gray-700">Welcome back, <span
                                        class=" text-purple-900 font-bold ">{{ $firstName[0] }}!</span></span>


                            </h1>
                        </div>
                        <div class="col-start-5">
                            <h1
                                class="sm:w-full lg:w-56 mr-5 px-3 py-1 text-sm border rounded-lg border-gray-300 font-semibold bg-white text-purple-600">

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                    </svg>



                                    <a href="/property" class="text-gray-900 ml-2">Choose Another Property</a>
                            </h1>
                        </div>

                        <div class="lg:ml-5 sm:m-0 col-start-6">
                            <h1
                                class="sm:w-full lg:w-48 px-3 py-1 text-sm border rounded-lg border-gray-300 font-semibold bg-white text-purple-600">

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>


                                    <a href="/user/{{ auth()->user()->id }}/export/property" target="_blank"
                                        class="text-gray-900">Export to PDF</a>
                            </h1>

                        </div>

                    </div>
                </div>


                <div class="ml-auto mr-auto px-5 gap-y-5  sm:mt-10 sm:grid grid-cols-1 lg:grid-cols-8 lg:">



                    <div class="col-span-5">
                        <div class="">

                            <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                                <ul class="flex flex-wrap -mb-px" id="dashboard" data-tabs-toggle="#dashboardTab"
                                    role="tablist">
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active"
                                            id="overview-tab" data-tabs-target="#overview" type="button" role="tab"
                                            aria-controls="overview" aria-selected="true">Overview</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                            id="charts-tab" data-tabs-target="#charts" type="button" role="tab"
                                            aria-controls="charts" aria-selected="false">Charts</button>
                                    </li>

                                </ul>
                            </div>
                            <div id="dashboardTab">
                                <div class="p-2 rounded-lg dark:bg-gray-800" id="overview" role="tabpanel"
                                    aria-labelledby="overview-tab">

                                    <!-- metrics -->
                                    <div class="w-max-screen-xl mx-auto px-4">
                                        <!--grid wrapper div-->
                                        <!--Note: negative margin you will apply below should matches padding you will apply above-->
                                        <div class="flex flex-wrap  -mx-4">
                                            <!--grid column div 1-->
                                            <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                                <!--grid content div 1-->
                                                <div class="flex-1 px-2 py-3">

                                                    <div
                                                        class="sm:w-full bg-purple-300 lg:w-36  h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                        <div class="flex items-center px-5 py-3">

                                                            <div class="mr-5">
                                                                <div class="">
                                                                    @if($collections->posted()->where('created_at',
                                                                    Carbon\Carbon::now()->subMonth())->sum('collection')
                                                                    > $collections->posted()->where('created_at',
                                                                    Carbon\Carbon::now()->month())->sum('collection'))
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor"
                                                                        class="text-purple-900 w-8 h-8">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                                                    </svg>
                                                                    @else
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor"
                                                                        class="text-purple-900 w-8 h-8">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                                    </svg>
                                                                    @endif


                                                                </div>
                                                                <div class="flex items-center">

                                                                    <div class="text-3xl font-bold text-white mr-2">
                                                                        {{App\Http\Controllers\Features\CollectionController::shortNumber($collections->posted()->where('created_at',Carbon\Carbon::now()->month)->sum('collection'))}}
                                                                    </div>

                                                                    <?php $change_in_monthly_collections = App\Http\Controllers\Features\CollectionController::divNumber($collections->posted()->where('created_at', Carbon\Carbon::now()->month())->sum('collection'), $collections->where('created_at', Carbon\Carbon::now()->subMonth())->sum('collection'))*100;?>
                                                                    @if($collections->where('created_at', Carbon\Carbon::now()->subMonth())->sum('collection')> $collections->posted()->where('created_at',
                                                                    Carbon\Carbon::now()->month())->sum('collection'))
                                                                    <div class="text-md font-medium text-red-500">{{
                                                                        number_format($change_in_monthly_collections, 1)
                                                                        }}%</div>
                                                                    @else
                                                                    <div class="text-md font-medium text-green-500">{{
                                                                        number_format($change_in_monthly_collections, 1)
                                                                        }}%</div>
                                                                    @endif

                                                                </div>
                                                                <div class="mt-2 text-sm text-gray-500"><span
                                                                        class="font-light">Monthly</span>
                                                                </div>
                                                                <div class="text-md text-gray-700"><span
                                                                        class="font-semibold">Revenue</span>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                            <!--grid column div 2-->
                                            <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                                <!--grid content div 2-->
                                                <div class="flex-1 px-2 py-3">
                                                    <div
                                                        class="sm:w-full bg-indigo-200 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                        <div class="flex items-center px-5 py-3">
                                                            <div class="mr-5">
                                                                <div class="">
                                                                    @if($expenses->where('created_at',
                                                                    Carbon\Carbon::now()->subMonth())->where('status',
                                                                    'completed')->sum('amount') >
                                                                    $expenses->where('created_at',
                                                                    Carbon\Carbon::now()->month)->where('status',
                                                                    'completed')->sum('amount'))
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor"
                                                                        class="text-purple-900 w-8 h-8">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                                                    </svg>
                                                                    @else
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor"
                                                                        class="text-purple-900 w-8 h-8">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                                    </svg>
                                                                    @endif

                                                                </div>
                                                                <div class="flex items-center">


                                                                    <div class="text-3xl font-bold text-white mr-2">
                                                                        {{App\Http\Controllers\CollectionController::shortNumber($expenses->where('created_at',
                                                                        Carbon\Carbon::now()->month())->where('status',
                                                                        'completed')->sum('amount')) }}
                                                                    </div>
                                                                    <?php $change_in_monthly_expenses = App\Http\Controllers\Features\CollectionController::divNumber($expenses->where('created_at', Carbon\Carbon::now()->month())->where('status', 'completed')->sum('amount'), $expenses->where('created_at', Carbon\Carbon::now()->subMonth())->where('status', 'completed')->sum('amount'))*100;?>
                                                                    @if($expenses->where('created_at',
                                                                    Carbon\Carbon::now()->subMonth())->where('status',
                                                                    'completed')->sum('amount') >
                                                                    $expenses->where('created_at',
                                                                    Carbon\Carbon::now()->month())->where('status',
                                                                    'completed')->sum('amount'))
                                                                    <div class="text-md font-medium text-red-500">-{{
                                                                        number_format($expenses->where('created_at',
                                                                        Carbon\Carbon::now()->subMonth())->where('status',
                                                                        'completed')->sum('amount'), 1) }}%</div>
                                                                    @else
                                                                    <div class="text-md font-medium text-green-500">{{
                                                                        number_format($expenses->where('created_at',
                                                                        Carbon\Carbon::now()->month())->where('status',
                                                                        'completed')->sum('amount'), 1) }}%</div>
                                                                    @endif

                                                                </div>
                                                                <div class="mt-2 text-sm text-gray-500"><span
                                                                        class="font-light">Monthly</span>
                                                                </div>
                                                                <div class="text-md text-gray-700"><span
                                                                        class="font-semibold">Expenses</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--grid column div 3-->
                                            <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                                <!--grid content div 3-->
                                                <div class="flex-1 px-2 py-3">
                                                    <div
                                                        class="sm:w-full bg-purple-100 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                        <div class="flex items-center px-5 py-7">
                                                            <div class="mr-5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="text-purple-900 w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185zM9.75 9h.008v.008H9.75V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 4.5h.008v.008h-.008V13.5zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                                </svg>

                                                                <div class="flex items-center">
                                                                    <div
                                                                        class="text-3xl font-semibold text-gray-400 mr-2">
                                                                        {{
                                                                        number_format($currentOccupancyRate->occupancy_rate,
                                                                        1) }}%</div>

                                                                </div>
                                                                <div class="text-sm text-gray-700">Occupancy</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--grid column div 4-->
                                            <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                                <!--grid content div 4-->
                                                <div class="flex-1 px-2 py-3">
                                                    <div
                                                        class="sm:w-full bg-purple-50 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                        <div class="flex items-center px-5 py-7">
                                                            <div class="mr-5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="text-purple-900 w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                                </svg>

                                                                <div class="flex items-center">
                                                                    <div
                                                                        class="text-3xl font-semibold text-gray-400 mr-2">
                                                                        {{ $contracts->where('status',
                                                                        'active')->whereDate('start',Carbon\Carbon::now()->month)->count()
                                                                        }}</div>
                                                                </div>
                                                                <div class="text-sm text-gray-700">Moveins</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--grid column div 5-->
                                            <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                                <!--grid content div 5-->
                                                <div class="flex-1 px-2 py-3">
                                                    <div
                                                        class="sm:w-full bg-purple-50 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                        <div class="flex items-center px-5 py-7">
                                                            <div class="mr-5">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="text-purple-900 w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                                </svg>

                                                                <div class="flex items-center">
                                                                    <div
                                                                        class="text-3xl font-semibold text-gray-400 mr-2">
                                                                        {{
                                                                        $contracts->where('status',
                                                                        'inactive')->whereDate('end',Carbon\Carbon::now()->month)->count()
                                                                        }}</div>
                                                                </div>
                                                                <div class="text-sm text-gray-500">Moveouts</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="w-max-screen-xl mx-auto px-4">
                                        <!--grid wrapper div-->
                                        <!--Note: negative margin you will apply below should matches padding you will apply above-->
                                        <div class="flex flex-wrap  -mx-4">
                                            <!--grid column div 3-->
                                            <div class="w-full md:w-full lg:w-1/2 flex flex-col p-4">
                                                <div class="flex-1 px-2 py-2">
                                                    <div class=" bg-white rounded-lg shadow-md p-5 h-full">

                                                        <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                                                            <ul class="flex flex-wrap -mb-px" id="myTab"
                                                                data-tabs-toggle="#myTabContent" role="tablist">
                                                                <li class="" role="presentation">
                                                                    <button
                                                                        class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                                                        id="profile-tab" data-tabs-target="#profile"
                                                                        type="button" role="tab" aria-controls="profile"
                                                                        aria-selected="false">Payments</button>
                                                                </li>
                                                                <li class="" role="presentation">
                                                                    <button
                                                                        class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active"
                                                                        id="dashboard-tab" data-tabs-target="#dashboard"
                                                                        type="button" role="tab"
                                                                        aria-controls="dashboard"
                                                                        aria-selected="true">Concerns</button>
                                                                </li>
                                                                <li class="" role="presentation">
                                                                    <button
                                                                        class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                                                        id="settings-tab" data-tabs-target="#settings"
                                                                        type="button" role="tab"
                                                                        aria-controls="settings"
                                                                        aria-selected="false">Moveout</button>
                                                                </li>

                                                            </ul>
                                                        </div>

                                                        <div id="myTabContent">

                                                            <div class="rounded-lg dark:bg-gray-800 hidden" id="profile"
                                                                role="tabpanel" aria-labelledby="profile-tab">
                                                                <div
                                                                    class="mt-3 mb-5 justify-center  grid grid-cols-2 gap-y-5 gap-x-2 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">

                                                                    <div class="col-span-1">
                                                                        <div class="h-5 w-full overflow-hidden">
                                                                            <div class="flex items-center ">
                                                                                <div class="">
                                                                                    <div class="ml-2 flex items-center">


                                                                                        <span
                                                                                            class="animate-pulse mx-1 text-red-600">{{
                                                                                            $paymentRequests->count()
                                                                                            }}</span>
                                                                                        <div
                                                                                            class="text-sm font-regular text-gray-600">
                                                                                            Pending Payments</div>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>



                                                                    </div>


                                                                </div>
                                                                @foreach ($paymentRequests->take(4)->get() as $item)
                                                                <li class="border-gray-400 flex flex-row mb-2">
                                                                    <div
                                                                        class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                        <div
                                                                            class="flex flex-col rounded-md w-10 h-10 bg-purple-300 justify-center items-center mr-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5" stroke="currentColor"
                                                                                class="text-white w-6 h-6">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                                                            </svg>

                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                                            </svg>

                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                                                            </svg>

                                                                        </div>
                                                                        <div class="flex-1 pl-1 mr-16">
                                                                            <div class="font-medium">{{ $item->tenant }}
                                                                            </div>
                                                                            <div class="text-gray-600 text-sm">{{
                                                                                number_format($item->amount, 2) }}
                                                                            </div>
                                                                        </div>
                                                                        <div button type="button"
                                                                            class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                            <a target="_blank"
                                                                                href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item->tenant_uuid }}/payment_requests/{{ $item->id }}">View</a></button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <span class="text-sm">{{
                                                                    Carbon\Carbon::parse($item->created_at)->diffForHumans()
                                                                    }}</span>
                                                                @endforeach
                                                                <div class="flex justify-end gap-2">
                                                                    <div
                                                                        class="items-center text-center px-2.5 py-1 mt-3  text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-900">
                                                                        <a
                                                                            href="/property/{{ Session::get('property_uuid') }}/collection/{{ 'pending' }}/{{ Session::get('property_uuid') }}">See
                                                                            more
                                                                            payment
                                                                            requests</a></button>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="rounded-lg dark:bg-gray-800" id="dashboard"
                                                                role="tabpanel" aria-labelledby="dashboard-tab">
                                                                <div
                                                                    class="mt-3 mb-5 justify-center  grid grid-cols-2 gap-y-5 gap-x-2 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">
                                                                    <div class="col-span-1">
                                                                        <div class="h-5 w-full overflow-hidden">
                                                                            <div class="flex items-center ">
                                                                                <div class="">
                                                                                    <div class="ml-2 flex items-center">


                                                                                        <span
                                                                                            class="animate-pulse mx-1 text-red-600">{{
                                                                                            $concerns->where('status',
                                                                                            'pending')->count()
                                                                                            }}</span>
                                                                                        <div
                                                                                            class="text-sm font-regular text-gray-600">
                                                                                            Pending Concerns</div>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>



                                                                    </div>
                                                                </div>

                                                                @foreach ($concerns->where('status',
                                                                'pending')->take(4)->get() as $item)
                                                                <li class="border-gray-400 flex flex-row mb-2">
                                                                    <div
                                                                        class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                        <div
                                                                            class="flex flex-col rounded-md w-10 h-10 bg-purple-300 justify-center items-center mr-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5" stroke="currentColor"
                                                                                class="text-white w-6 h-6">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                                            </svg>

                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                                                            </svg>

                                                                        </div>
                                                                        <div class="flex-1 pl-1 mr-16">
                                                                            <div class="font-medium">
                                                                                @if($item->tenant_uuid)
                                                                                {{ $item->tenant->tenant }} - {{
                                                                                $item->unit->unit }}
                                                                                @else
                                                                                {{ $item->unit->unit }}
                                                                                @endif
                                                                            </div>
                                                                            <div class="text-gray-600 text-sm">{{
                                                                                $item->category->category }}</div>
                                                                        </div>
                                                                        <div button type="button"
                                                                            class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                            @if($item->tenant_uuid)
                                                                            <a target="_blank"
                                                                                href="/property/{{ Session::get('property_uuid') }}/concern/{{ $item->id }}/edit">Respond</a>
                                                                            @else
                                                                            <a target="_blank"
                                                                                href="/property/{{ Session::get('property_uuid') }}/concern/{{ $item->id }}/edit">Respond</a>
                                                                            @endif
                                                                        </div>

                                                                    </div>

                                                                </li>
                                                                <span class="text-sm">{{
                                                                    Carbon\Carbon::parse($item->created_at)->diffForHumans()
                                                                    }}</span>
                                                                @endforeach

                                                            </div>

                                                            <div class="rounded-lg dark:bg-gray-800 hidden"
                                                                id="settings" role="tabpanel"
                                                                aria-labelledby="settings-tab">
                                                                <div
                                                                    class="mt-3 mb-5 justify-center  grid grid-cols-2 gap-y-5 gap-x-2 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">
                                                                    <div class="col-span-1">
                                                                        <div class="h-5 w-full overflow-hidden">
                                                                            <div class="flex items-center ">
                                                                                <div class="">
                                                                                    <div class="ml-2 flex items-center">
                                                                                        <span
                                                                                            class="animate-pulse mx-1 text-red-600">{{
                                                                                            $contracts->where('status',
                                                                                            'pending')->count()
                                                                                            }}</span>
                                                                                        <div
                                                                                            class="text-sm font-regular text-gray-600">
                                                                                            Moveout Requests</div>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @foreach ($contracts->where('status',
                                                                'pending')->take(4) as $item)
                                                                <li class="border-gray-400 flex flex-row mb-2">
                                                                    <div
                                                                        class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                        <div
                                                                            class="flex flex-col rounded-md w-10 h-10 bg-purple-300 justify-center items-center mr-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5" stroke="currentColor"
                                                                                class="text-white w-6 h-6">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                                                            </svg>


                                                                        </div>
                                                                        <div class="flex-1 pl-1 mr-16">
                                                                            <div class="font-medium">{{
                                                                                $item->tenant->tenant }}</div>
                                                                            <div class="text-gray-600 text-sm">{{
                                                                                $item->moveout_reason }}</div>
                                                                        </div>
                                                                        <div button type="button"
                                                                            class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                            <a
                                                                                href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout">View</a></button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <span class="text-sm">{{
                                                                    Carbon\Carbon::parse($item->created_at)->diffForHumans()
                                                                    }}</span>
                                                                @endforeach
                                                                <div class="flex justify-end gap-2">
                                                                    <div
                                                                        class="items-center text-center px-2.5 py-1 mt-3  text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-900">
                                                                        <a
                                                                            href="/property/{{ Session::get('property_uuid') }}/contract/pendingmoveout">See
                                                                            more
                                                                            moveout
                                                                            requests</a></button>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--grid column div 1-->
                                            <div class="w-full sm:w-1/2 lg:w-1/2 flex flex-col p-4">
                                                <!--grid content div 1-->
                                                <div class="flex-1 px-2 py-2">
                                                    <!-- bills and collection -->
                                                    <div class=" bg-white rounded-lg shadow-md  px-5">
                                                        <div class="">
                                                            <div class="flex items-center">
                                                                <div class="ml-0 w-0 flex-1">
                                                                    <div class="text-sm">
                                                                        <h2
                                                                            class="p-2 text-lg font-semibold text-gray-700">
                                                                            Bills and
                                                                            Collection</h2>
                                                                        <div
                                                                            class="mb-5 bg-gray-50 h-full w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                                            <div class="p-4">
                                                                                <div class="flex items-start">
                                                                                    <div class="flex-shrink-0">

                                                                                    </div>
                                                                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                                                                        <p
                                                                                            class="text-sm font-medium text-gray-900">
                                                                                            Total
                                                                                            Bills for Collection</p>
                                                                                        <p
                                                                                            class="mt-1 text-2xl font-semibold text-gray-500">
                                                                                            {{
                                                                                            App\Http\Controllers\Features\CollectionController::shortNumber($bills->posted()->where('created_at',
                                                                                            Carbon\Carbon::now()->month())->sum('bill'))
                                                                                            }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="mb-5 bg-purple-100 w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                                            <div class="p-4">
                                                                                <div class="flex items-start">

                                                                                    <div class="flex-shrink-0">

                                                                                    </div>
                                                                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                                                                        <p
                                                                                            class="text-sm font-medium text-gray-900">
                                                                                            Collected Bills </p>
                                                                                        <p
                                                                                            class="mt-1 text-2xl font-semibold text-gray-500">
                                                                                            {{App\Http\Controllers\Features\CollectionController::shortNumber($collections->posted()->where('created_at',Carbon\Carbon::now()->month())->sum('collection'))}}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div
                                                                            class="mb-5 bg-indigo-200 w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                                            <div class="p-4">
                                                                                <div class="flex items-start">
                                                                                    <div class="flex-shrink-0">

                                                                                    </div>

                                                                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                                                                        <p
                                                                                            class="text-sm font-medium text-gray-900">
                                                                                            Total
                                                                                            Unpaid Collection:</p>
                                                                                        <p
                                                                                            class="mt-1 text-2xl font-semibold text-gray-500">
                                                                                            {{
                                                                                            App\Http\Controllers\Features\CollectionController::shortNumber($bills->posted()->where('status',
                                                                                            'unpaid')->where('created_at',
                                                                                            Carbon\Carbon::now()->month())->sum('bill'))
                                                                                            }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- expiring contracts -->
                                            <div class="w-full sm:w-1/2 lg:w-full flex flex-col p-4">
                                                <!--grid content div 2-->
                                                <div class="flex-1 px-2 py-2">
                                                    <h2 class="p-3 font-semibold text-xl text-gray-700"> Expiring
                                                        Contracts</h2>
                                                    <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
                                                        <div
                                                            class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                                            @include('tables.contracts')
                                                        </div>
                                                        <div class="flex justify-end gap-2">
                                                            <div button type="button"
                                                                class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                </button>
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--grid column div 2-->
                                            <div class="w-full sm:w-1/2 lg:w-1/2 flex flex-col p-4">
                                                <!--grid content div 2-->
                                                <div class="flex-1 px-2 py-2">
                                                    <!-- delinquents -->
                                                    <div class="bg-gray-200 rounded-lg shadow-md w-full">
                                                        <div class="flex justify-end items-end pr-5 pt-6"></div>
                                                        <div class="flex items-center">
                                                            <div class="ml-0 w-0 flex-1">
                                                                <div
                                                                    class="pl-5 ml-4 text-xl font-semibold text-black ">
                                                                    Delinquents</div>
                                                            </div>
                                                        </div>

                                                        <!-- component -->
                                                        <div
                                                            class="container flex mx-auto w-full items-center justify-center">

                                                            <ul class="flex flex-col bg-gray-200 p-4">
                                                                @forelse ($delinquentTenants as $item)
                                                                <a
                                                                    href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item['tenant_uuid'] }}/bills">
                                                                    <li class="border-gray-400 flex flex-row mb-2">
                                                                        <div
                                                                            class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                            <div
                                                                                class="flex flex-col rounded-md w-10 h-10 bg-gray-200 justify-center items-center mr-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24"
                                                                                    fill="currentColor" class="w-6 h-6">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                                                        clip-rule="evenodd" />
                                                                                </svg>


                                                                            </div>
                                                                            <div class="flex-1 pl-1 mr-16">
                                                                                <div class="font-medium">{{
                                                                                    $item['tenant'] }} (T)</div>
                                                                                <div class="font-light">
                                                                                    {{App\Http\Controllers\Features\CollectionController::shortNumber(($item['balance']))}}
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </li>
                                                                </a>
                                                                @empty
                                                                @endforelse

                                                            </ul>



                                                        </div>

                                                        <div
                                                            class="container flex mx-auto w-full items-center justify-center">

                                                            <ul class="flex flex-col bg-gray-200 p-4">
                                                                @forelse ($delinquentOwners as $item)
                                                                <a
                                                                    href="/property/{{ Session::get('property_uuid') }}/owner/{{ $item['owner_uuid'] }}/bills">
                                                                    <li class="border-gray-400 flex flex-row mb-2">
                                                                        <div
                                                                            class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                            <div
                                                                                class="flex flex-col rounded-md w-10 h-10 bg-gray-200 justify-center items-center mr-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24"
                                                                                    fill="currentColor" class="w-6 h-6">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                                                        clip-rule="evenodd" />
                                                                                </svg>


                                                                            </div>
                                                                            <div class="flex-1 pl-1 mr-16">
                                                                                <div class="font-medium">{{
                                                                                    $item['owner'] }} (O)</div>
                                                                                <div class="font-light">{{
                                                                                    App\Http\Controllers\Features\CollectionController::shortNumber(($item['balance']))
                                                                                    }}</div>
                                                                            </div>

                                                                        </div>
                                                                    </li>
                                                                </a>
                                                                @empty
                                                                @endforelse

                                                            </ul>
                                                        </div>

                                                        <div
                                                            class="container flex mx-auto w-full items-center justify-center">

                                                            <ul class="flex flex-col bg-gray-200 p-4">
                                                                @forelse ($delinquentGuests as $item)
                                                                <a
                                                                    href="/property/{{ Session::get('property_uuid')}}/guest/{{ $item['guest_uuid'] }}/bills">
                                                                    <li class="border-gray-400 flex flex-row mb-2">
                                                                        <div
                                                                            class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                            <div
                                                                                class="flex flex-col rounded-md w-10 h-10 bg-gray-200 justify-center items-center mr-4">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24"
                                                                                    fill="currentColor" class="w-6 h-6">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                                                        clip-rule="evenodd" />
                                                                                </svg>


                                                                            </div>
                                                                            <div class="flex-1 pl-1 mr-16">
                                                                                <div class="font-medium">{{
                                                                                    $item['guest'] }} (G)</div>
                                                                                <div class="font-light">{{
                                                                                    App\Http\Controllers\Features\CollectionController::shortNumber(($item['balance']))
                                                                                    }}</div>
                                                                            </div>

                                                                        </div>
                                                                    </li>
                                                                </a>
                                                                @empty
                                                                @endforelse

                                                            </ul>
                                                        </div>


                                                    </div>


                                                </div>
                                            </div>
                                            <!--grid column div 2-->
                                            <div class="w-full sm:w-1/2 lg:w-1/2 flex flex-col p-4">
                                                <!--grid content div 2-->
                                                <div class="flex-1 px-2 py-2">
                                                    <!-- personnels -->
                                                    <div class="bg-indigo-200 rounded-lg shadow-md w-full">
                                                        <div class="flex justify-end items-end pr-5 pt-6"></div>
                                                        <div class="flex items-center">
                                                            <div class="ml-0 w-0 flex-1">
                                                                <div
                                                                    class="pl-5 ml-4 text-xl font-semibold text-black ">
                                                                    Personnels</div>
                                                            </div>
                                                        </div>

                                                        <!-- component -->
                                                        <div
                                                            class="container flex mx-auto w-full items-center justify-center">

                                                            <ul class="flex flex-col bg-indigo-200 p-4">

                                                                @foreach ($personnels->take(4) as $item)

                                                                <li class="border-gray-400 flex flex-row mb-2">
                                                                    <div
                                                                        class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                        <div
                                                                            class="flex flex-col rounded-md w-10 h-10 bg-indigo-200 justify-center items-center mr-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 24 24" fill="currentColor"
                                                                                class="w-6 h-6">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>


                                                                        </div>
                                                                        <div class="flex-1 pl-1 mr-16">
                                                                            <div class="font-medium">{{
                                                                                $item->user->name }}</div>
                                                                            <div class="text-gray-600 text-sm">{{
                                                                                $item->user->role->role }}</div>
                                                                        </div>

                                                                    </div>
                                                                </li>

                                                                @endforeach

                                                            </ul>



                                                        </div>

                                                        <div class="flex justify-end pb-5 pr-5 gap-2">
                                                            <a href="/property/{{ Session::get('property_uuid')}}/user">
                                                                <div
                                                                    class="items-center text-center px-2.5 mt-3 py-2 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    See more personnels
                                                                </div>
                                                            </a>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>



                                <!-- charts tab -->
                                <div class="p-4 rounded-lg dark:bg-gray-800 hidden" id="charts" role="tabpanel"
                                    aria-labelledby="charts-tab">

                                    <div class="mx-10 lg:-ml-1 mt-10 col-span-4">

                                        <script
                                            src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
                                            defer>
                                        </script>




                                        <div x-data="app()" x-cloak class="">
                                            <div class="sm:w-full py-10">
                                                <div class="shadow p-6 rounded-lg bg-white">
                                                    <div class="md:flex md:justify-between md:items-center">
                                                        <div>
                                                            <h2 class="text-xl text-gray-800 font-bold leading-tight">
                                                                Move Ins</h2>
                                                            <p class="mb-2 text-gray-600 text-sm">Monthly Count</p>
                                                        </div>

                                                        <!-- Legends -->
                                                        <div class="mb-4">
                                                            <div class="flex items-center">
                                                                <div class="w-2 h-2 bg-purple-200 mr-2 rounded-full">
                                                                </div>
                                                                <div class="text-sm text-gray-700">Moveins</div>
                                                            </div>


                                                        </div>
                                                    </div>




                                                    <div class="line my-8 relative">
                                                        <!-- Tooltip -->
                                                        <template x-if="tooltipOpen == true">
                                                            <div x-ref="tooltipContainer"
                                                                class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                                                                :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`">
                                                                <div class="shadow-xs rounded-lg bg-white p-2">
                                                                    <div
                                                                        class="flex items-center justify-between text-sm">
                                                                        <div>Number:</div>
                                                                        <div class="font-bold ml-2">
                                                                            <span x-html="tooltipContent"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </template>

                                                        <!-- Bar Chart -->
                                                        <div class="flex -mx-2 items-end mb-2">
                                                            <template x-for="data in chartData">

                                                                <div class="px-2 w-1/6">
                                                                    <div :style="`height: ${data}px`"
                                                                        class="transition ease-in duration-200 bg-purple-200 hover:bg-purple-400 relative"
                                                                        @mouseenter="showTooltip($event); tooltipOpen = true"
                                                                        @mouseleave="hideTooltip($event)">
                                                                        <div x-text="data"
                                                                            class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm">
                                                                        </div>
                                                                    </div>

                                                                </div>



                                                            </template>
                                                        </div>

                                                        <!-- Labels -->
                                                        <div class="border-t border-gray-400 mx-auto"
                                                            :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`">
                                                        </div>
                                                        <div class="flex -mx-2 items-end">
                                                            <template x-for="data in labels">
                                                                <div class="px-2 w-1/6">
                                                                    <div class="bg-red-600 relative">
                                                                        <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto"
                                                                            style="width: 1px"></div>
                                                                        <div x-text="data"
                                                                            class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function app() {
      return {
        chartData: {!!$new_contracts_count!!},
        labels: {!!$new_contracts_date!!},

        tooltipContent: '',
        tooltipOpen: false,
        tooltipX: 0,
        tooltipY: 0,
        showTooltip(e) {
          console.log(e);
          this.tooltipContent = e.target.textContent
          this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
          this.tooltipY = e.target.clientHeight + e.target.clientWidth;
        },
        hideTooltip(e) {
          this.tooltipContent = '';
          this.tooltipOpen = false;
          this.tooltipX = 0;
          this.tooltipY = 0;
        }
      }
    }
                                    </script>
                                </div>

                                <div class="mt-10 mx-5 col-span-2">

                                    <div class="bg-white h-full rounded-lg shadow-md overflow-hidden">


                                        <div class="pt-3 font-semibold px-5 text-lg ">Collection Rate</div>
                                        <canvas class="p-10" id="chartDoughnut"></canvas>
                                    </div>

                                    <!-- Required chart.js -->
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                    <!-- Chart doughnut -->
                                    <script>
                                        const dataDoughnut = {
                                    labels: ["Collected", "Uncollected", ],
                                    datasets: [
                                      {
                                        label: "My First Dataset",
                                        data: [{{ $total_collected_bills }}, {{ $total_uncollected_bills }}],
                                        backgroundColor: [
                                          "rgb(133, 105, 241)",
                                          "rgb(199, 210, 254)",

                                        ],
                                        hoverOffset: 4,
                                      },
                                    ],
                                  };

                                  const configDoughnut = {
                                    type: "doughnut",
                                    data: dataDoughnut,
                                    options: {},
                                  };

                                  var chartBar = new Chart(
                                    document.getElementById("chartDoughnut"),
                                    configDoughnut
                                  );
                                    </script>
                                </div>
                            </div> --}}
