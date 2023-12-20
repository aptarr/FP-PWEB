<x-app-layout>
    @if(session('success'))
    <div class="flex items-center justify-center w-full h-8 py-auto bg-green-300 font-semibold">
        {{ session('success') }}
    </div>
    @endif

    <style>
        /* Add your CSS styles here */
        .tab-content {
            display: none;
        }

        .tab.active {
            background-color: #ffffff;
            /* Lighter background color for active tab */
            border-bottom: 3px solid #000000;
            /* Underline for active tab */
        }

        .tab.inactive {
            background-color: #f0f0f0;
            /* Dimmer background color for inactive tabs */
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <div class="flex items-center bg-white place-content-center">
        <div class="px-32 py-10 flex">
            <div class="ml-20 w-150">
                <div class="mt-8 text-3xl font-bold">
                    {{ $service->title}}
                </div>

                <div class="mt-5">
                    <div id="default-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Item 1 -->
                            <div class="">
                                @if(isset($service->image))
                                <img src="{{ Storage::url($service->image) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="image-service">
                                @else
                                <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                                @endif
                            </div>

                        </div>

                    </div>

                    <div class="mt-10">
                        <div class="text-lg font-semibold">
                            Mengenai kos ini
                        </div>
                        <div class="text-lg font-normal">
                            {{ $service->description}}
                        </div>
                    </div>


                    <div class="mt-20 text-lg font-semibold">
                        Mengenai penyewa kos
                    </div>
                    <div class="mt-5 flex">
                        <a href="{{ route('profile.page.show', ['id' => $service->user_id]) }}"
                            class="text-decoration-none">
                            @if(isset($service->user_image))
                            <img src="{{ Storage::url($service->user_image) }}" class="rounded-full h-14 w-14"
                                alt="image-service">
                            @else
                            <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}"
                                class="rounded-full h-14 w-14" alt="...">
                            @endif
                        </a>
                        <div>
                            <div class="ml-4 font-semibold text-lg">
                                <a href="{{ route('profile.page.show', ['id' => $service->user_id]) }}"
                                    class="text-decoration-none">
                                    {{ $service->username}}
                                </a>
                            </div>
                            <div class="ml-4 flex items-center">
                                <svg class="h-4 w-4 black width=" 24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873"
                                        fill="currentColor" />
                                </svg>
                                <div class="ml-1">
                                    {{ $service->average_star}}
                                </div>
                                <div class="ml-1">
                                    (
                                </div>
                                <div class="underline">
                                    {{ count($reviews)}}
                                </div>
                                <div>
                                    )
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="button"
                            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-black hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Contact
                            Me</button>
                    </div>

                    <div class="mt-12 border border-gray-300 w-full p-5">
                        <div>
                            {{ $service->description }}
                        </div>
                        <!-- <div class="flex border-t border-gray-300 mt-5 py-2 font-semibold">
                            <div class="w-1/2">
                                        Languages

                                        @foreach($languages as $language)
                                        <div class="font-normal">
                                            <li>{{ $language }}</li>
                                        </div>
                                        @endforeach
                           </div>
                           <div class="w-1/2">
                                        Member Since
                                        <div class="font-normal">
                                        {{ $registrationYear }}
                                        </div>
                           </div>
                        </div> -->
                    </div>

                    <div class="mt-20 text-lg font-semibold">
                        Reviews
                    </div>
                    <div class="flex">
                        <div class="w-1/2">
                            {{ count($reviews)}} Reviews for this Gig
                        </div>
                        <div class="w-1/2">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 black width=" 24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873"
                                        fill="currentColor" />
                                </svg>
                                <div class="ml-1">
                                    {{ $service->average_star}}
                                </div>
                                <div class="ml-1">
                                    (
                                </div>
                                <div class="underline">
                                    {{ count($reviews)}}
                                </div>
                                <div>
                                    )
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full border-gray-300 border mt-12"></div>
                    @if(count($reviews) > 0)
                    @foreach($reviews as $review)

                    <div class="mt-8">
                        <div class="flex">
                            <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}"
                                alt="Example Image" class="rounded-full h-14 w-14">
                            <div>
                                <div class="ml-4 font-semibold text-lg">

                                    {{$review->user_name}}

                                </div>
                                <div class="ml-4 flex items-center">
                                    <svg class="h-4 w-4 black width=" 24" height="24" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873"
                                            fill="currentColor" />
                                    </svg>
                                    <div class="ml-1">
                                        {{$review->star_rating}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="ml-16 px-3 text-justify">
                                {{$review->review_description}}
                            </div>
                        </div>
                        <div class="w-full border-gray-300 border mt-8"></div>
                    </div>
                    @endforeach
                    @else
                    <div class="mt-8">
                        <div>
                            No review avalaible
                        </div>
                    </div>
                    @endif

                </div>
            </div>

            <div class="ml-20">
                <div class="sticky top-7">
                    <div class="flex justify-end">
                        <div class="border border-gray-400 rounded-md px-2 py-1 flex">
                            <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="6" cy="12" r="3" />
                                <circle cx="18" cy="6" r="3" />
                                <circle cx="18" cy="18" r="3" />
                                <line x1="8.7" y1="10.7" x2="15.3" y2="7.3" />
                                <line x1="8.7" y1="13.3" x2="15.3" y2="16.7" />
                            </svg>
                        </div>
                        <div class="border border-gray-400 rounded-md px-2 py-1 ml-3">
                            <a href="{{ route('report.show', ['id' => $service->id]) }}"
                                class="text-decoration-none hover:underline">
                                Report Service
                            </a>
                        </div>
                        @if(auth()->user()->isAdmin)
                        <div class="border border-gray-400 rounded-md px-2 py-1 ml-3">
                            <form method="POST"
                                action="{{ route('service.admin.destroy', ['id_service' => $service->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><x-delete-icon /></a>
                            </form>
                        </div>
                        @endif

                    </div>
                    <div class="flex mt-5">
                        <div class="border border-gray-300 w-32 py-3 text-center tab active" data-tab="basic">
                            Basic
                        </div>
                        <div class="border border-gray-300 w-32 py-3 text-center tab inactive" data-tab="standard">
                            Standard
                        </div>
                        <div class="border border-gray-300 w-32 py-3 text-center tab inactive" data-tab="premium">
                            Premium
                        </div>
                    </div>
                    <div class="border border-gray-300 py-5">
                        <div class="tab-content" id="basicContent">
                            <div class="flex px-5 font-semibold">
                                <div class="w-1/2">
                                    {{$service->basic_plan_title}}
                                </div>
                                <div class="w-1/2 flex justify-end">
                                    ${{$service->basic_plan_price}}
                                </div>
                            </div>
                            <div class="flex mt-5 px-5">
                                <div class="w-80 text-justify">
                                    {{$service->basic_plan_description}}
                                </div>
                            </div>

                            <div class="mt-2 px-5 flex">
                                <svg class="h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <circle cx="12" cy="12" r="9" />
                                    <polyline points="12 7 12 12 15 15" />
                                </svg>
                                <div class="ml-3">
                                    {{$service->basic_plan_days}} days delivery
                                </div>
                            </div>
                            <form
                                action="{{ route('store.transaction', ['id' => $service->id, 'package' => 'basic']) }}"
                                method="POST">
                                @csrf
                                <div class="flex place-content-center mt-5">
                                    <button type="submit"
                                        class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-sm text-sm px-36 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 me-2 mb-2">
                                        Continue
                                    </button>
                                </div>
                            </form>

                        </div>
                        <div class="tab-content hidden" id="standardContent">
                            <div class="flex px-5 font-semibold">
                                <div class="w-1/2">
                                    {{$service->standard_plan_title}}
                                </div>
                                <div class="w-1/2 flex justify-end">
                                    ${{$service->standard_plan_price}}
                                </div>
                            </div>
                            <div class="flex mt-5 px-5">
                                <div class="w-80 text-justify">
                                    {{$service->standard_plan_description}}
                                </div>
                            </div>

                            <div class="mt-2 px-5 flex">
                                <svg class="h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <circle cx="12" cy="12" r="9" />
                                    <polyline points="12 7 12 12 15 15" />
                                </svg>
                                <div class="ml-3">
                                    {{$service->standard_plan_days}} days delivery
                                </div>
                            </div>
                            <form
                                action="{{ route('store.transaction', ['id' => $service->id, 'package' => 'standard']) }}"
                                method="POST">
                                @csrf
                                <div class="flex place-content-center mt-5">
                                    <button type="submit"
                                        class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-sm text-sm px-36 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 me-2 mb-2">
                                        Continue
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-content hidden" id="premiumContent">
                            <div class="flex px-5 font-semibold">
                                <div class="w-1/2">
                                    {{$service->premium_plan_title}}
                                </div>
                                <div class="w-1/2 flex justify-end">
                                    ${{$service->premium_plan_price}}
                                </div>
                            </div>
                            <div class="flex mt-5 px-5">
                                <div class="w-80 text-justify">
                                    {{$service->premium_plan_description}}
                                </div>
                            </div>

                            <div class="mt-2 px-5 flex">
                                <svg class="h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <circle cx="12" cy="12" r="9" />
                                    <polyline points="12 7 12 12 15 15" />
                                </svg>
                                <div class="ml-3">
                                    {{$service->premium_plan_days}} days delivery
                                </div>
                            </div>
                            <form
                                action="{{ route('store.transaction', ['id' => $service->id, 'package' => 'premium']) }}"
                                method="POST">
                                @csrf
                                <div class="flex place-content-center mt-5">
                                    <button type="submit"
                                        class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-sm text-sm px-36 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 me-2 mb-2">
                                        Continue
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>






        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

    <script>
        // Add your JavaScript code here
        document.addEventListener('DOMContentLoaded', function () {
            // Get tabs and tab contents
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            // Display the Basic content by default
            document.getElementById('basicContent').style.display = 'block';

            // Add click event listener to each tab
            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    const tabId = this.getAttribute('data-tab');

                    // Remove active class from all tabs
                    tabs.forEach(function (tab) {
                        tab.classList.remove('active');
                        tab.classList.add('inactive');
                    });

                    // Add active class to the clicked tab
                    this.classList.remove('inactive');
                    this.classList.add('active');

                    // Hide all tab contents
                    tabContents.forEach(function (content) {
                        content.style.display = 'none';
                    });

                    // Show the selected tab content
                    document.getElementById(tabId + 'Content').style.display = 'block';
                });
            });
        });
    </script>

</x-app-layout>