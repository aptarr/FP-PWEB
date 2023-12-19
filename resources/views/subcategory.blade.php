<x-app-layout>
<style>
    /* Add your CSS styles here */
    .tab-content {
      display: none;
    }

    .tab.active {
      background-color: #f0f0f0; /* Lighter background color for active tab */
    }

  </style>

    <div class="flex items-center justify-center bg-white">
            <div class="w-4/5 min-h-800">
                <div class="mt-10 text-3xl font-bold">
                    {{$subcategoryModel->subcategory_name}}
                </div>
                <div class="mt-5 text-xl">
                    Semua kos yang ada di {{$subcategoryModel->subcategory_name}}
                </div>

                <div class="mt-10 border border-t-gray-300 w-full">
                </div>

                <div class="">
                <div class="mt-10">
                    <div class="flex">
                        <div class="font-bold border border-gray-300 rounded-lg w-32 py-3 text-center tab inactive flex justify-center" data-tab="budget">
                            Harga
                            <svg class="ml-2 h-6 w-6 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" /></svg>
                        </div>
                        <div class="hidden font-bold border border-gray-300 rounded-lg w-40 py-3 ml-4 text-center tab inactive justify-center" data-tab="delivery">
                            Delivery time
                            <svg class="ml-2 h-6 w-6 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" /></svg>
                        </div>
                    </div>

                        <div class="tab-content hidden mt-2 rounded-lg border border-gray-300 p-5 w-64" id="budgetContent" data-subcategory="{{ $subcategoryModel->subcategory_name }}">
                            <input id="budgetValue" name="budgetHidden" class="hidden" value="{{$budgetLower}}-{{$budgetUpper}}">
                            <!-- <div id="budgetValue" class="hidden" data-subcategory="{{$budgetLower}}-{{$budgetUpper}}"></div> -->

                            <div class="flex items-center">
                                <input id="default-radio-1" type="radio" value="0-300000" name="budget-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2">
                                <label for="default-radio-1" class="ms-2 text-base font-bold">Value</label>
                                <div class="ml-5">Dibawah Rp300.000</div>
                            </div>
                            <div class="flex items-center mt-2">
                                <input checked id="default-radio-2" type="radio" value="300000-700000" name="budget-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 ">
                                <label for="default-radio-2" class="ms-2 text-base font-bold ">Mid-range</label>
                                <div class="ml-5">Rp300.000 - Rp700.000</div>
                            </div>
                            <div class="flex items-center mt-2">
                                <input checked id="default-radio-3" type="radio" value="700000-1000000" name="budget-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 ">
                                <label for="default-radio-3" class="ms-2 text-base font-bold ">High-end</label>
                                <div class="ml-5">Diatas Rp700.000</div>
                            </div>

                            <div class="mt-3 flex justify-center">
                                <a href="#" onclick="applyFilters()" class="block px-2 py-1 hover:bg-gray-200 font-extrabold">
                                    <button type="button" class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-md text-sm px-20 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30">
                                        Apply
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="ml-36 tab-content hidden mt-2 rounded-lg border border-gray-300 p-5 w-64" id="deliveryContent">
                            <input id="timeHidden" name="timeHidden" class="hidden" value="{{$time}}">
                            <div class="flex items-center">
                                <input id="default-radio-5" type="radio" value="1" name="time-radio"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2">
                                <label for="default-radio-5" class="ms-2 text-base font-bold">Express 24H</label>
                            </div>
                            <div class="flex items-center mt-2">
                                <input checked id="default-radio-6" type="radio" value="3" name="time-radio"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 ">
                                <label for="default-radio-6" class="ms-2 text-base font-bold ">Up to 3 days</label>
                            </div>
                            <div class="flex items-center mt-2">
                                <input checked id="default-radio-7" type="radio"  value="7" name="time-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 ">
                                <label for="default-radio-7" class="ms-2 text-base font-bold ">Up to 7 days</label>
                            </div>
                            <div class="flex items-center mt-2">
                                <input checked id="default-radio-8" type="radio" value="999" name="time-radio"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 ">
                                <label for="default-radio-8" class="ms-2 text-base font-bold ">Anytime</label>
                            </div>
                            <div class="mt-3 flex justify-center">
                                <a href="#" onclick="applyFiltersTime()" class="block px-2 py-1 hover:bg-gray-200 font-extrabold">
                                    <button type="button" class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-md text-sm px-20 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30">
                                        Apply
                                    </button>
                                </a>
                            </div>


                        </div>

                        <div class="w-full mt-4 p-4">

                        @php
                            $filteredServices = $services->filter(function ($service) use ($budgetLower, $budgetUpper, $time) {
                                return $service->harga_per_bulan >= $budgetLower
                                    && $service->harga_per_bulan <= $budgetUpper;
                            });

                            $servicesChunks = $filteredServices->chunk(5);
                        @endphp



                        @foreach($servicesChunks as $serviceChunk)
                            <div class="flex w-full mt-5 gap-5">
                                @foreach($serviceChunk as $service)


                                    <div class="w-56">
                                            <div id="" class="relative w-56 h-52">
                                            <!-- Carousel wrapper -->
                                                <div class="relative overflow-hidden rounded-lg md:h-52">
                                                    <!-- Item 1 -->
                                                    <div>
                                                    <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}" class="text-decoration-none">
                                                        @if(isset($service->image))
                                                            <img src="{{ Storage::url($service->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="image-service">
                                                        @else
                                                            <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                        @endif
                                                    </a>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- <div class="mt-2 flex">
                                                @if(isset($service->user_image))
                                                    <img src="{{ Storage::url($service->user_image) }}" class="rounded-full h-7 w-7" alt="image-service">
                                                @else
                                                    <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}" class="rounded-full h-7 w-7" alt="...">
                                                @endif
                                                <div>
                                                    <div class="ml-2 font-semibold text-base">
                                                        <a href="{{ route('profile.page.show', ['id' => $service->user_id]) }}" class="text-decoration-none">
                                                            {{ $service->username}}
                                                        </a>

                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="mt-1 text-lg">
                                            <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}" class="text-decoration-none hover:underline">
                                            {{ $service->title}}
                                            </a>
                                            </div>

                                            <div class="mt-4 flex items-center">
                                                <svg class="h-4 w-4 black width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z"/>
                                                    <path d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873" fill="currentColor" />
                                                </svg>
                                                <div class="ml-1">
                                                {{ $service->average_star}}
                                                </div>
                                                <div class="ml-1">
                                                    (
                                                </div>
                                                <div class="">
                                                    {{ $service->total_reviews}}
                                                </div>
                                                <div>
                                                    )
                                                </div>
                                            </div>

                                            <div class="font-bold">
                                                <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}" class="text-decoration-none hover:underline">
                                                    Harga Rp{{ number_format($service->harga_per_bulan, 0, ',', '.') }}
                                                </a>
                                            </div>


                                    </div>

                                    @endforeach
                                </div>

                                @endforeach
                            </div>

                </div>
            </div>



            </div>
    </div>

    <script>
  // Add your JavaScript code here
  document.addEventListener('DOMContentLoaded', function () {
    // Get tabs and tab contents
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');

    // Display the Basic content by default
    // document.getElementById('basicContent').style.display = 'block';

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
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', function() {
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

    // function applyFiltersTime() {
    //     // Get the selected radio button value
    //     var timeValue = document.querySelector('input[name="time-radio"]:checked').value;

    //     console.log(timeValue);



    //     var budgetValue = document.getElementById('budgetValue').value;

    //     // var budgetValue = document.getElementById('budgetValue').getAttribute('data-subcategory');

    //     // console.log(budgetValue);

    //     // Split the value to get lower and upper bounds
    //     var [budgetLower, budgetUpper] = budgetValue.split('-');

    //     var subcategoryName = document.getElementById('budgetContent').getAttribute('data-subcategory');


    //     // Update the URL with the selected values
    //     var url = "{{ route('subcategory.show', ['subcategory' => ':subcategory', 'budgetLower' => ':budgetLower', 'budgetUpper' => ':budgetUpper', 'time' => ':time']) }}";
    //     url = url.replace(':subcategory', subcategoryName).replace(':budgetLower', budgetLower).replace(':budgetUpper', budgetUpper).replace(':time', timeValue);

    //     console.log(url);
    //     // Redirect to the updated URL
    //     window.location.href = url;
    // }
</script>
</x-app-layout>
