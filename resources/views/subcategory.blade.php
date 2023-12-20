<x-app-layout>
    <style>
        /* Add your CSS styles here */
        .tab-content {
            display: none;
        }

        .tab.active {
            background-color: #f0f0f0;
            /* Lighter background color for active tab */
        }
    </style>

    <div class="w-full min-h-screen bg-white p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h1 class="font-bold text-4xl text-center md:text-3xl md:mt-12 mb-2">{{$subcategoryModel->subcategory_name}}
            </h1>
            <h1 class="text-xl text-center md:text-3xl mb-4">Semua kos yang ada di
                {{$subcategoryModel->subcategory_name}}
            </h1>

            <div class="flex justify-center sm:w-8/12 mx-auto">
                <div class="font-bold border border-gray-300 rounded-lg w-32 py-3 text-center tab inactive flex justify-center"
                    data-tab="budget">
                    Harga
                    <svg class="ml-2 h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" />
                    </svg>
                </div>
                <div class="hidden font-bold border border-gray-300 rounded-lg w-40 py-3 ml-4 text-center tab inactive justify-center"
                    data-tab="delivery">
                    Delivery time
                    <svg class="ml-2 h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" />
                    </svg>
                </div>
            </div>

            <div class="tab-content hidden mt-2 rounded-lg border border-gray-300 p-5 w-64 mx-auto" id="budgetContent"
                data-subcategory="{{ $subcategoryModel->subcategory_name }}">
                <input id="budgetValue" name="budgetHidden" class="hidden" value="{{$budgetLower}}-{{$budgetUpper}}">
                <!-- <div id="budgetValue" class="hidden" data-subcategory="{{$budgetLower}}-{{$budgetUpper}}"></div> -->

                <div class="flex items-center">
                    <input id="default-radio-1" type="radio" value="0-300000" name="budget-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2">
                    <label for="default-radio-1" class="ms-2 text-base font-bold">Value</label>
                    <div class="ml-5">Dibawah Rp300.000</div>
                </div>
                <div class="flex items-center mt-2">
                    <input checked id="default-radio-2" type="radio" value="300000-700000" name="budget-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 ">
                    <label for="default-radio-2" class="ms-2 text-base font-bold ">Mid-range</label>
                    <div class="ml-5">Rp300.000 - Rp700.000</div>
                </div>
                <div class="flex items-center mt-2">
                    <input checked id="default-radio-3" type="radio" value="700000-1000000" name="budget-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 ">
                    <label for="default-radio-3" class="ms-2 text-base font-bold ">High-end</label>
                    <div class="ml-5">Diatas Rp700.000</div>
                </div>

                <div class="mt-3 flex justify-center">
                    <a href="#" onclick="applyFilters()" class="block px-2 py-1 hover:bg-gray-200 font-extrabold">
                        <button type="button"
                            class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-md text-sm px-20 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30">
                            Apply
                        </button>
                    </a>
                </div>
            </div>
            @php
            $filteredServices = $services->filter(function ($service) use ($budgetLower, $budgetUpper,
            $time) {
            return $service->harga_per_bulan >= $budgetLower
            && $service->harga_per_bulan <= $budgetUpper; }); $servicesChunks=$filteredServices->chunk(2);
                @endphp
                @foreach($servicesChunks as $serviceChunk)
                <div class="flex flex-wrap justify-center">
                    @foreach($serviceChunk as $service)
                    <div class="flex flex-col bg-white rounded-lg shadow-md w-full overflow-hidden sm:w-96 p-5 m-3">
                        @if(isset($service->image))
                        <img src="{{ Storage::url($service->image) }}" class="h-50 w-full object-cover rounded-md"
                            alt="image-service">
                        @else
                        <img src="{{ asset('images/gambar_1.jpg') }}" class="h-50 w-full object-cover rounded-md"
                            alt="...">
                        @endif
                        <div class="mt-1 text-lg">
                            <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}"
                                class="text-decoration-none hover:underline mt-2 text-2xl font-bold text-stone-900">
                                {{ $service->title}}
                            </a>
                        </div>
                        <p class="mt-2 text-stone-900">
                            testing
                        </p>
                    </div>
                    @endforeach
                </div>
                @endforeach
        </div>
        <div class="hidden md:flex flex-col w-full md:w-1/2 relative">
            <iframe
                src="https://www.google.com/maps/d/u/0/embed?mid=1osXGNZ1kNz_Qvg8CEHqoRVmnLLDgtuc&ehbc=2E312F&noprof=1"
                class="sticky top-0 h-screen desktop:block" width="900px" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <script>
        // Add your JavaScript code here
        document.addEventListener('DOMContentLoaded', function () {
            // Get tabs and tab contents
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            // Add click event listener to each tab
            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    const tabId = this.getAttribute('data-tab');

                    // Check if the clicked tab is already active
                    const isActive = this.classList.contains('active');

                    // Remove active class from all tabs
                    tabs.forEach(function (tab) {
                        tab.classList.remove('active');
                        tab.classList.add('inactive');
                    });

                    // Hide all tab contents
                    tabContents.forEach(function (content) {
                        content.style.display = 'none';
                    });

                    // If the clicked tab was not active, make it active and show the corresponding content
                    if (!isActive) {
                        this.classList.remove('inactive');
                        this.classList.add('active');
                        document.getElementById(tabId + 'Content').style.display = 'block';
                    }
                });
            });
        });

        const radioButtons = document.querySelectorAll('input[name="default-radio"]');
        const customInput = document.getElementById('custom');

        // Add event listeners to all radio buttons
        radioButtons.forEach(function (radioButton) {
            radioButton.addEventListener('change', function () {
                // Enable or disable the custom input based on the "Custom" radio button's checked status
                customInput.disabled = !document.getElementById('default-radio-4').checked;
            });
        });

        function applyFilters() {
            // Get the selected radio button value
            var selectedValue = document.querySelector('input[name="budget-radio"]:checked').value;

            var timeValue = document.getElementById('timeHidden').value;

            // Split the value to get lower and upper bounds
            var [budgetLower, budgetUpper] = selectedValue.split('-');

            var subcategoryName = document.getElementById('budgetContent').getAttribute('data-subcategory');


            // Update the URL with the selected values
            var url = "{{ route('subcategory.show', ['subcategory' => ':subcategory', 'budgetLower' => ':budgetLower', 'budgetUpper' => ':budgetUpper', 'time' => ':time']) }}";
            url = url.replace(':subcategory', subcategoryName).replace(':budgetLower', budgetLower).replace(':budgetUpper', budgetUpper).replace(':time', timeValue);

            // Redirect to the updated URL
            window.location.href = url;
        }
    </script>
</x-app-layout>