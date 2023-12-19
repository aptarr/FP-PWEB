<nav x-data="{ open: false }" class="bg-white border-gray-100 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex pt-5 w-full items-center">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-sixerr-logo class="h-10" />
                </a>
            </div>

            <!-- Search bar -->
            <div class="ml-5 w-4/5">
                <!-- routes to be added later -->
                <form action="{{ route('service.filter') }}" method="POST" class="flex items-center justify-center">
                @csrf
                    <x-text-input id="search_bar" name="search_bar" type="text" class="mt-1 block w-11/12 " placeholder="Kost apa yang ingin anda cari hari ini?" />
                    <button type="submit" class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm w-1/12 px-4 py-2.5 text-center inline-flex items-center justify-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 me-2">
                        Cari
                    </button>
                </form>

            </div>

            <!-- Notification icon -->
            <div class="hidden sm:flex sm:items-center sm:ms-5">
            <x-notification-logo class="h-8 w-8 text-gray-800"/>
                <!-- <x-dropdown align="right" width="80">
                    <x-slot name="trigger">
                        <x-notification-logo class="h-8 w-8 text-gray-800"/>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown> -->
            </div>

            <!-- Message Icon -->
            <div class="hidden sm:flex sm:items-center sm:ms-5">
                <x-message-logo class="h-8 w-8 text-gray-800"/>
                <!-- <x-dropdown align="right" width="80">
                    <x-slot name="trigger">
                    <x-message-logo class="h-8 w-8 text-gray-800"/>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                       
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown> -->
            </div>



            <!-- Wishlist Icon -->
            <div class="hidden sm:flex sm:items-center sm:ms-5">
                <x-wishlist-logo class="h-8 w-8 text-gray-800"/>
                <!-- <x-dropdown align="right" width="80">
                    <x-slot name="trigger">
                        <x-wishlist-logo class="h-8 w-8 text-gray-800"/>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                      
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown> -->
            </div>

            
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.show')">
                            {{ __('Profil') }}
                        </x-dropdown-link>


                        @unless(auth()->user()->isSeller)
                            <x-dropdown-link :href="route('get.myorder')">
                                {{ __('Riwayat Transaksi') }}
                            </x-dropdown-link>
                        @endunless

                        @if(auth()->user()->isSeller)
                        <x-dropdown-link :href="route('get.sellorder')">
                            {{ __('Transaksi Saya') }}
                        </x-dropdown-link>
                        @endif

                        @if(auth()->user()->isAdmin)
                            <x-dropdown-link :href="route('admin.show', ['id' => auth()->user()->id])">
                                {{ __('Halaman Admin') }}
                            </x-dropdown-link>
                        @endif


                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Atur Akun') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Keluar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

    </div>

    <div class="flex mt-4 border-gray-200 border ">
            <div class="flex mx-auto z-40">


                <!-- Navigation Links -->
                <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> -->


                <div class="hidden space-x-4 sm:-my-px sm:ms-5 sm:flex">
                    <div class="group inline-block relative">
                        <x-nav-link href="{{ route('subcategory.show', ['subcategory' => 'Jakarta', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}">
                            {{ __('Jakarta') }}
                        </x-nav-link>
                  
                    </div>
                </div>



                    <div class="hidden space-x-4 sm:-my-px sm:ms-5 sm:flex">
                        <div class="group inline-block relative">
                            <x-nav-link href="{{ route('subcategory.show', ['subcategory' => 'Bogor', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}">
                                {{ __('Bogor') }}
                            </x-nav-link>
                        </div>
                    </div>

                    <div class="hidden space-x-4 sm:-my-px sm:ms-5 sm:flex">
                        <div class="group inline-block relative">
                            <x-nav-link href="{{ route('subcategory.show', ['subcategory' => 'Surabaya', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}">
                                {{ __('Surabaya') }}
                            </x-nav-link>

                        </div>
                    </div>

                    <div class="hidden space-x-4 sm:-my-px sm:ms-5 sm:flex">
                        <div class="group inline-block relative">
                        <x-nav-link href="{{ route('subcategory.show', ['subcategory' => 'Bekasi', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}">
                                {{ __('Bekasi') }}
                            </x-nav-link>


                        </div>

                    </div>

                    <div class="hidden space-x-4 sm:-my-px sm:ms-5 sm:flex">
                        <div class="group inline-block relative">
                        <x-nav-link href="{{ route('subcategory.show', ['subcategory' => 'Yogyakarta', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}">
                                {{ __('Yogyakarta') }}
                            </x-nav-link>


                        </div>

                    </div>

                    <div class="hidden space-x-4 sm:-my-px sm:ms-5 sm:flex">
                        <div class="group inline-block relative">
                        <x-nav-link href="{{ route('subcategory.show', ['subcategory' => 'Semarang', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}">
                                {{ __('Semarang') }}
                            </x-nav-link>

                        </div>

                    </div>

                    <div class="hidden space-x-4 sm:-my-px sm:ms-5 sm:flex">
                        <div class="group inline-block relative">
                        <x-nav-link href="{{ route('subcategory.show', ['subcategory' => 'Depok', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}">
                                {{ __('Depok') }}
                            </x-nav-link>

                        </div>
                    </div>

                    <div class="hidden space-x-4 sm:-my-px sm:ms-5 sm:flex">
                        <div class="group inline-block relative">
                        <x-nav-link href="{{ route('subcategory.show', ['subcategory' => 'Bandung', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}">
                                {{ __('Bandung') }}
                            </x-nav-link>

                        </div>

                    </div>

                    <div class="hidden space-x-4 sm:-my-px sm:ms-5 sm:flex">
                    <div class="group inline-block relative">
                    <x-nav-link href="{{ route('subcategory.show', ['subcategory' => 'Tangerang', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}">
                                {{ __('Tangerang') }}
                            </x-nav-link>

                        </div>

                    </div>

            </div>
        </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 ">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 ">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1 z-50">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
