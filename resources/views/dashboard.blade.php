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
                          
                            <form action="{{ route('service.filter') }}" method="POST" class="flex items-center justify-center">
                            @csrf
                                <x-text-input id="search_bar" name="search_bar" type="text" class="mt-1 block w-11/12 " placeholder="What service are you looking for today?" />
                                <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
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
                <div class="grid grid-cols-2 w-8/12 mx-auto">
                    <div class="col-span-2 sm:col-span-1 ">
                        <div class="text-3xl font-bold text-gray-700"> Rekomendasi
                            kos di</div>
                    </div>

                    <div class="flex justify-end col-span-1">
                        <div class="inline-flex rounded-md shadow-sm right-0">
                            <a href="https://github.com/themesberg/flowbite/blob/main/content/components/button-group.md"
                                rel="noopener nofollow noreferrer"
                                class="inline-flex items-center justify-center h-9 mr-3 px-3 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300">Lihat
                                Semua
                            </a>
                            <button onclick="next()"
                                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                            <button onclick="prev()"
                                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
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
                    <a  href="{{ route('subcategory.show', ['subcategory' => 'Jakarta', 'budgetLower' => 0, 'budgetUpper' => 1000000, 'time' => 999]) }}" class="block relative h-50 w-full group">
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

        <div class="bg-white py-8 w-10/12 mx-auto font-semibold text-3xl text-gray-800 leading-tight">
            Selamat datang, {{ Auth::user()->name }}!
        </div>

        <div class="bg-white mt-4 w-10/12 mx-auto font-semibold text-2xl text-gray-800 leading-tight flex">
            Kos rekomendasi di
            <div class="ml-1 text-blue-600">
                {{$randomSubcategory->subcategory_name}}
            </div>
        </div>

        <div id="default-carousel" class="relative w-10/12 mx-auto py-4">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96 border border-gray-300">
                <!-- Item 1 -->
                <div class="  flex gap-5 justify-center py-3 px-3">
                    @foreach ($reccomendServices as $service)
                    <div class="w-64 h-96">
                        <div id="" class="relative w-full h-52">
                            <!-- Carousel wrapper -->
                            <div class="relative overflow-hidden rounded-lg md:h-52">
                                <!-- Item 1 -->
                                <div>
                                    <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}"
                                        class="text-decoration-none">
                                        @if(isset($service->image))
                                        <img src="{{ Storage::url($service->image) }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="image-service">
                                        @else
                                        <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                        @endif
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="mt-2 flex">
                            <a href="{{ route('profile.page.show', ['id' => $service->user_id]) }}"
                                class="text-decoration-none">
                                @if(isset($service->image))
                                <img src="{{ Storage::url($service->image) }}" class="rounded-full h-7 w-7"
                                    alt="image-service">
                                @else
                                <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}"
                                    class="rounded-full h-7 w-7" alt="...">
                                @endif
                            </a>
                            <div>
                                <div class="ml-2 font-semibold text-base">
                                    <a href="{{ route('profile.page.show', ['id' => $service->user_id]) }}"
                                        class="text-decoration-none">
                                        {{$service->username}}
                                    </a>


                                </div>
                            </div>
                        </div>

                        <div class="mt-1 text-lg">
                            <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}"
                                class="text-decoration-none">
                                {{$service->title}}
                            </a>
                        </div>

                        <div class="mt-4 flex items-center">
                            <svg class="h-4 w-4 black width=" 24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873"
                                    fill="currentColor" />
                            </svg>
                            <div class="ml-1">
                                {{$service->average_star}}
                            </div>
                            <div class="ml-1">
                                (
                            </div>
                            <div class="">
                                {{$service->total_reviews}}
                            </div>
                            <div>
                                )
                            </div>
                        </div>

                        <div class="font-bold">
                            <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}"
                                class="text-decoration-none">
                                From ${{ $service->basic_plan_price}}
                            </a>
                        </div>

                    </div>

                    @endforeach
                </div>
            </div>

            <div class="bg-white mt-4 w-10/12 mx-auto font-semibold text-2xl text-gray-800 leading-tight flex">
                All Gigs
            </div>

            <div class="w-10/12 mx-auto mt-4">
                @php
                $servicesChunks = $services->chunk(5);
                @endphp

                @foreach($servicesChunks as $serviceChunk)
                <div class="flex gap-5">
                    @foreach($serviceChunk as $service)


                    <div class="w-1/12 h-96">
                        <div id="" class="relative w-full h-52">
                            <!-- Carousel wrapper -->
                            <div class="relative overflow-hidden rounded-lg md:h-52">
                                <!-- Item 1 -->
                                <div>
                                    <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}"
                                        class="text-decoration-none">
                                        @if(isset($service->image))
                                        <img src="{{ Storage::url($service->image) }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="image-service">
                                        @else
                                        <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                        @endif
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="mt-2 flex">
                            <a href="{{ route('profile.page.show', ['id' => $service->user_id]) }}"
                                class="text-decoration-none">
                                @if(isset($service->image))
                                <img src="{{ Storage::url($service->image) }}" class="rounded-full h-7 w-7"
                                    alt="image-service">
                                @else
                                <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}"
                                    class="rounded-full h-7 w-7" alt="...">
                                @endif
                            </a>

                            <div>
                                <div class="ml-2 font-semibold text-base">
                                    <a href="{{ route('profile.page.show', ['id' => $service->user_id]) }}"
                                        class="text-decoration-none">
                                        {{$service->username}}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-1 text-lg">
                            <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}"
                                class="text-decoration-none hover:underline">
                                {{ $service->title}}
                            </a>
                        </div>

                        <div class="mt-4 flex items-center">
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
                            <div class="">
                                {{ $service->total_reviews}}
                            </div>
                            <div>
                                )
                            </div>
                        </div>

                        <div class="font-bold">
                            <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}"
                                class="text-decoration-none hover:underline">
                                From ${{ $service->basic_plan_price}}
                            </a>
                        </div>

                    </div>

                    @endforeach
                </div>

                @endforeach
            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        <script>
            let sliderContainer = document.getElementById('slideContainer');
            let slider = document.getElementById('slider');
            let cards = document.getElementsByTagName('li');

            let elementToShow = 4;

            let sliderContainerWidth = sliderContainer.clientWidth;

            let cardWidth = sliderContainerWidth / elementToShow;

            slider.style.width = cards.length * cardWidth + 'px';
            slider.style.transition = 'margin';
            slider.style.transitionDuration = '1s';

            for (let index = 0; index < cards.length; index++) {
                const element = cards[index];
                element.style.width = cardWidth + 'px';
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
        </script>
</x-app-layout>