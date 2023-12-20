<x-app-layout>
    @if(session('success'))
    <div class="flex items-center justify-center w-full h-8 py-auto bg-green-300 font-semibold">
        {{ session('success') }}
    </div>
    @endif

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

    <div class=" bg-white">
        <div class="relative isolate pt-14 overflow-hidden bg-cover bg-no-repeat"
            style="background-image: url('{{ asset('images/hero_back.svg') }}'); height: 500px;">
            <div class="mx-auto max-w-7xl py-32">
                <div class="text-center">
                    <h1 class="text-5xl font-extrabold tracking-tight text-white sm:text-6xl drop-shadow-md">Mau cari
                        Kost mudah dan cepat?</h1>
                    <h4 class="text-lg font-extrabold tracking-tight text-white sm:text-2xl"> dengan durasi sewa
                        fleksibel harian & bulanan</h4>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <div class="ml-5 w-4/5">

                            <form action="{{ route('service.filter') }}" method="POST"
                                class="flex items-center justify-center">
                                @csrf
                                <x-text-input id="search_bar" name="search_bar" type="text" class="mt-1 block w-11/12 "
                                    placeholder="What service are you looking for today?" />
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Cari
                                </button>
                            </form>

                        </div>
                        <!-- <a href="#"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cari</a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="w-10/12 mx-auto py-10">
            <div class="flex">
                <div class="grid grid-cols-1 sm:grid-cols-2 w-full sm:w-8/12 mx-auto">
                    <div class="flex items-center col-span-2 sm:col-span-1">
                        <div class="text-3xl font-bold text-stone-900">Rekomendasi kos di</div>
                        <div class="relative ml-2" id="dropdownButton">
                            <div onclick="toggleDropdown()" id="dropdownButtonContent"
                                class="border-solid border-gray-300 border-[1px] px-5 py-2 rounded-lg cursor-pointer font-bold flex justify-between items-center bg-white shadow-sm">
                                <div id="selectedOptionText" class="text-stone-900">OPTION</div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <div id="dropdown"
                                class="absolute top-full left-0 right-0 rounded-lg border-[1px] border-gray-100 bg-white shadow-md hidden">
                                <div onclick="selectOption('Jakarta')"
                                    class="text-stone-900 cursor-pointer p-4 hover:bg-gray-300">
                                    Jakarta</div>
                                <div onclick="selectOption('City 2')"
                                    class="text-stone-900 cursor-pointer p-4 hover:bg-gray-300">City
                                    2</div>
                                <div onclick="selectOption('City 3')"
                                    class="text-stone-900 cursor-pointer p-4 hover:bg-gray-300">City
                                    3</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end col-span-1 mx-auto mt-4 sm:mt-0">
                        <div class="inline-flex rounded-md right-0">
                            <a href="https://github.com/themesberg/flowbite/blob/main/content/components/button-group.md"
                                rel="noopener nofollow noreferrer"
                                class="inline-flex items-center justify-center h-9 mr-3 px-3 text-xs font-medium text-stone-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-yellow-400 focus:z-10 focus:ring-2 focus:ring-gray-300 text-lg">Lihat
                                Semua
                            </a>

                            <button onclick="next()"
                                class="px-4 py-2 text-sm font-medium text-stone-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-stone-900 focus:text-stone-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                            <button onclick="prev()"
                                class="px-4 py-2 text-sm font-medium text-stone-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-stone-900 focus:text-stone-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="w-10/12 overflow-hidden mx-auto" id="slideContainer">
                    <ul id="slider" class="flex w-full">
                        <li class="p-5">
                            <div class="border rounded-lg p-5 h-full">
                                <img class="h-50 w-full object-cover rounded-md"
                                    src="{{ asset('images/gambar_1.jpg') }}" alt="">
                                <h2 class="mt-2 text-2xl font-bold text-gray-700">some big</h2>
                                <p class="mt-2 text-gray-700">
                                    testing
                                </p>
                            </div>
                        </li>
                        <li class="p-5">
                            <div class="border rounded-lg p-5 h-full">
                                <img class="h-50 w-full object-cover rounded-md"
                                    src="{{ asset('images/gambar_1.jpg') }}" alt="">
                                <h2 class="mt-2 text-2xl font-bold text-gray-700">some big</h2>
                                <p class="mt-2 text-gray-700">
                                    testing
                                </p>
                            </div>
                        </li>
                        <li class="p-5">
                            <div class="border rounded-lg p-5 h-full">
                                <img class="h-50 w-full object-cover rounded-md"
                                    src="{{ asset('images/gambar_1.jpg') }}" alt="">
                                <h2 class="mt-2 text-2xl font-bold text-gray-700">some big</h2>
                                <p class="mt-2 text-gray-700">
                                    testing
                                </p>
                            </div>
                        </li>
                        <li class="p-5">
                            <div class="border rounded-lg p-5 h-full">
                                <img class="h-50 w-full object-cover rounded-md"
                                    src="{{ asset('images/gambar_1.jpg') }}" alt="">
                                <h2 class="mt-2 text-2xl font-bold text-gray-700">some big</h2>
                                <p class="mt-2 text-gray-700">
                                    testing
                                </p>
                            </div>
                        </li>
                        <li class="p-5">
                            <div class="border rounded-lg p-5 h-full">
                                <img class="h-50 w-full object-cover rounded-md"
                                    src="{{ asset('images/gambar_1.jpg') }}" alt="">
                                <h2 class="mt-2 text-2xl font-bold text-gray-700">some big</h2>
                                <p class="mt-2 text-gray-700">
                                    testing
                                </p>
                            </div>
                        </li>
                        <li class="p-5">
                            <div class="border rounded-lg p-5 h-full">
                                <img class="h-50 w-full object-cover rounded-md"
                                    src="{{ asset('images/gambar_1.jpg') }}" alt="">
                                <h2 class="mt-2 text-2xl font-bold text-gray-700">some big</h2>
                                <p class="mt-2 text-gray-700">
                                    testing
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="py-10">
            <div class="container mx-auto text-center text-3xl font-bold text-gray-700">Area Kos Populer</div>
            <div class="container mx-auto flex flex-wrap items-center my-16">
                <div class="w-full max-w-sm bg-white overflow-hidden lg:w-1/4 p-3 pr-0">
                    <a href="{{ route('subcategory.show', ['subcategory' => 'Jakarta', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}"
                        class="block relative h-50 w-full group">
                        <div
                            class="absolute inset-0 bg-black opacity-0 group-hover:opacity-60 transition-opacity rounded-md">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl font-bold">Jakarta</span>
                        </div>
                        <img class="h-full w-full object-cover rounded-md" src="{{ asset('images/gambar_1.jpg') }}"
                            alt="">
                    </a>
                </div>
                <div class="w-full max-w-sm bg-white overflow-hidden lg:w-1/4 p-3 pr-0">
                    <a href="#" class="block relative h-50 w-full group">
                        <div
                            class="absolute inset-0 bg-black opacity-0 group-hover:opacity-60 transition-opacity rounded-md">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl font-bold">Jakarta</span>
                        </div>
                        <img class="h-full w-full object-cover rounded-md" src="{{ asset('images/gambar_1.jpg') }}"
                            alt="">
                    </a>
                </div>
                <div class="w-full max-w-sm bg-white overflow-hidden lg:w-1/4 p-3 pr-0">
                    <a href="#" class="block relative h-50 w-full group">
                        <div
                            class="absolute inset-0 bg-black opacity-0 group-hover:opacity-60 transition-opacity rounded-md">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl font-bold">Jakarta</span>
                        </div>
                        <img class="h-full w-full object-cover rounded-md" src="{{ asset('images/gambar_1.jpg') }}"
                            alt="">
                    </a>
                </div>
                <div class="w-full max-w-sm bg-white overflow-hidden lg:w-1/4 p-3 pr-0">
                    <a href="#" class="block relative h-50 w-full group">
                        <div
                            class="absolute inset-0 bg-black opacity-0 group-hover:opacity-60 transition-opacity rounded-md">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-white text-5xl font-bold">Jakarta</span>
                        </div>
                        <img class="h-full w-full object-cover rounded-md" src="{{ asset('images/gambar_1.jpg') }}"
                            alt="">
                    </a>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        <script>
            let sliderContainer = document.getElementById('slideContainer');
            let slider = document.getElementById('slider');
            let cards = document.getElementsByTagName('li');

            let elementToShow = calculateElementToShow();

            let sliderContainerWidth = sliderContainer.clientWidth;

            let cardWidth = sliderContainerWidth / elementToShow;

            slider.style.width = cards.length * cardWidth + 'px';
            slider.style.transition = 'margin';
            slider.style.transitionDuration = '1s';

            for (let index = 0; index < cards.length; index++) {
                const element = cards[index];
                element.style.width = cardWidth + 'px';
            }

            function calculateElementToShow() {
                return window.innerWidth >= 500 ? 4 : 1; // Adjust the width as needed
            }

            function prev() {
                console.log(+slider.style.marginLeft.slice(0, -2));
                console.log(cardWidth * (cards.length - elementToShow));
                if ((+slider.style.marginLeft.slice(0, -2)) != (-cardWidth * (cards.length - elementToShow)))
                    slider.style.marginLeft = ((+slider.style.marginLeft.slice(0, -2)) - cardWidth) + 'px';
            }

            function next() {
                console.log(+slider.style.marginLeft.slice(0, -2));
                if (+slider.style.marginLeft.slice(0, -2) != 0)
                    slider.style.marginLeft = ((+slider.style.marginLeft.slice(0, -2)) + cardWidth) + 'px';
            }

            // Recalculate on window resize
            window.addEventListener('resize', function () {
                elementToShow = calculateElementToShow();
                sliderContainerWidth = sliderContainer.clientWidth;
                cardWidth = sliderContainerWidth / elementToShow;

                slider.style.width = cards.length * cardWidth + 'px';

                for (let index = 0; index < cards.length; index++) {
                    const element = cards[index];
                    element.style.width = cardWidth + 'px';
                }
            });

            function toggleDropdown() {
                const dropdown = document.getElementById('dropdown');
                dropdown.classList.toggle('hidden');
            }

            function selectOption(value) {
                const selectedOptionText = document.getElementById('selectedOptionText');
                selectedOptionText.textContent = value;

                // You can now use the selected value in your component or redirect as needed.
                // For example, you can store the value in a variable or update a component state.
                console.log('Selected Value:', value);

                // Close the dropdown after selection (optional)
                toggleDropdown();
            }
        </script>
</x-app-layout>