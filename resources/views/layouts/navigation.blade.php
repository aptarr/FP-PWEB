<nav x-data="{ open: false }" class="bg-white border-gray-100 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="{{ route('dashboard') }}" class="-m-1.5 p-1.5">
                    <img src="{{ asset('logo/logo_kost.png') }}" class="h-10" alt="...">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                    id="open_menu">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">

            </div>
            <div class="hidden lg:flex  lg:gap-x-12 lg:flex-1 lg:justify-end">
                <a href="#rekomendasi" class="text-sm font-semibold leading-6 text-gray-900 px-3 py-2">Cari Kost?</a>
                @guest
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-sm font-semibold leading-6 text-gray-900">Guest</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('login')">
                            {{ __('Login') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('register')">
                            {{ __('Register') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
                @endguest
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-sm font-semibold leading-6 text-gray-900">{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>


                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.show')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @unless(auth()->user()->isSeller())
                        <x-dropdown-link :href="route('get.myorder')">
                            {{ __('My Transaction') }}
                        </x-dropdown-link>
                        @endif


                        @if(auth()->user()->isSeller())
                        <x-dropdown-link :href="route('get.sellorder')">
                            {{ __('Manage Selling Order') }}
                        </x-dropdown-link>
                        @endif

                        @if(auth()->user()->isAdmin())
                        <x-dropdown-link :href="route('admin.show', ['id' => auth()->user()->id])">
                            {{ __('Admin Page') }}
                        </x-dropdown-link>
                        @endif


                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Account Setting') }}
                        </x-dropdown-link>


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth
            </div>
        </nav>

        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden hidden transition-transform duration-500 translate-x-full ease-out opacity-0"
            role="dialog" aria-modal="true" id="side_bar">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50"></div>
            <div
                class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <img src="{{ asset('logo/logo_kost.png') }}" class="h-10" alt="...">
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" id="close_menu">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Cari
                                Kost?</a>
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>

                            @auth
                            <x-dropdown align="left" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="-mx-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div
                                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                            {{ Auth::user()->name
                                            }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.show')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    @unless(auth()->user()->isSeller())
                                    <x-dropdown-link :href="route('get.myorder')">
                                        {{ __('My Transaction') }}
                                    </x-dropdown-link>
                                    @endif

                                    @if(auth()->user()->isSeller())
                                    <x-dropdown-link :href="route('get.sellorder')">
                                        {{ __('Manage Selling Order') }}
                                    </x-dropdown-link>
                                    @endif

                                    @if(auth()->user()->isAdmin())
                                    <x-dropdown-link :href="route('admin.show', ['id' => auth()->user()->id])">
                                        {{ __('Admin Page') }}
                                    </x-dropdown-link>
                                    @endif


                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Account Setting') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                            @endauth
                        </div>
                        <div class="py-6">
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the open and close buttons, and the mobile menu
        const openButton = document.getElementById('open_menu');
        const closeButton = document.getElementById('close_menu');
        const mobileMenu = document.getElementById('side_bar');

        console.log('Open button:', openButton);
        console.log('Close button:', closeButton);
        console.log('Mobile menu:', mobileMenu);

        // Check if the elements are found before adding event listeners
        if (openButton && closeButton && mobileMenu) {
            // Add a click event listener to the open button
            openButton.addEventListener('click', function () {
                // Toggle the 'lg:hidden' class on the mobile menu
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.toggle('opacity-0');
                mobileMenu.classList.toggle('opacity-100');
                mobileMenu.classList.toggle('translate-x-full');
            });

            // Add a click event listener to the close button
            closeButton.addEventListener('click', function () {
                // Close the menu
                mobileMenu.classList.add('hidden');
            });
        } else {
            console.error('One or more elements not found.');
        }
    });

</script>