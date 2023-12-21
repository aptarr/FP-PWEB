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
                <p class="ml-2">jalan. Keputih tegal timur .....</p>
                <div class="flex items-center mt-2 text-stone-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <p class="ml-2">{{ $service->subcategory->subcategory_name }}</p>
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
                                <img src="{{ asset('images/gambar_1.jpg') }}"
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

                    <div class="mt-12 border border-gray-300 w-9/12 p-5">
                        <div>
                            <div class="font-semibold text-2xl">
                                Deskripsi Kost
                            </div>
                            {{ $service->description }}
                        </div>
                        <div class="flex border-t border-gray-300 mt-5 py-2 font-semibold">
                            <div class="w-full">
                                <div class="font-semibold text-2xl">
                                    Fasilitas Kamar
                                </div>

                                <div class="grid grid-cols-2 gap-4 mt-5">
                                    @foreach($fasilitasKamar as $fasilitas)
                                    <div class="font-normal flex items-center">
                                        @if($fasilitas === 'K. Mandi Dalam')
                                        <img data-v-3d87c57a="" data-testid="detail-kost-facility__icon"
                                            alt="K. Mandi Dalam" class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/b8yekhj4.png"
                                            src="https://static.mamikos.com/uploads/tags/b8yekhj4.png" lazy="loaded"
                                            style="filter: grayscale(100%); width: 20px; height: 20px;">
                                        @endif

                                        @if($fasilitas === 'Lemari Baju')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon"
                                            alt="Lemari Baju" class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/egu43HCg.png"
                                            src="https://static.mamikos.com/uploads/tags/egu43HCg.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Air Panas')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="Air panas"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/zKWuh5ma.png"
                                            src="https://static.mamikos.com/uploads/tags/zKWuh5ma.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'AC')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="AC"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/lqunlyi8.png"
                                            src="https://static.mamikos.com/uploads/tags/lqunlyi8.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Kursi')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="Kursi"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/MB9milt9.png"
                                            src="https://static.mamikos.com/uploads/tags/MB9milt9.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Jendela')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="Jendela"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/PAsBbxrm.png"
                                            src="https://static.mamikos.com/uploads/tags/PAsBbxrm.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Kasur')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="Kasur"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/Y4ZfXUdX.png"
                                            src="https://static.mamikos.com/uploads/tags/Y4ZfXUdX.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'TV')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="TV"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/ZYjIeqGp.png"
                                            src="https://static.mamikos.com/uploads/tags/ZYjIeqGp.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Meja')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="Meja"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/nluOWsFG.png"
                                            src="https://static.mamikos.com/uploads/tags/nluOWsFG.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Kipas Angin')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon"
                                            alt="Kipas Angin" class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/gQ6hjpk3.png"
                                            src="https://static.mamikos.com/uploads/tags/gQ6hjpk3.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Termasuk Listrik')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon"
                                            alt="Termasuk listrik" class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/GIUdAv2J.png"
                                            src="https://static.mamikos.com/uploads/tags/GIUdAv2J.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Wifi')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="WiFi"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/HAAjIo8D.png"
                                            src="https://static.mamikos.com/uploads/tags/HAAjIo8D.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Mesin Cuci')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="Mesin Cuci"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/nFsJ8SPt.png"
                                            src="https://static.mamikos.com/uploads/tags/nFsJ8SPt.png" lazy="loaded">
                                        @endif

                                        <div class="text-lg ml-2">
                                            {{ $fasilitas }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="flex border-t border-gray-300 mt-5 py-2 font-semibold">
                            <div class="w-full">
                                <div class="font-semibold text-2xl">
                                    Fasilitas Kamar Mandi
                                </div>

                                <div class="grid grid-cols-2 gap-4 mt-5">
                                    @foreach($fasilitasKamarMandi as $fasilitas)
                                    <div class="font-normal flex items-center">

                                        @if($fasilitas === 'Kloset Duduk')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon"
                                            alt="Kloset Duduk" class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/TyT47meW.png"
                                            src="https://static.mamikos.com/uploads/tags/TyT47meW.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Shower')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon" alt="Shower"
                                            class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/cbxCWmko.png"
                                            src="https://static.mamikos.com/uploads/tags/cbxCWmko.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Ember Mandi')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon"
                                            alt="Ember mandi" class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/B71K93ll.png"
                                            src="https://static.mamikos.com/uploads/tags/B71K93ll.png" lazy="loaded">
                                        @endif

                                        @if($fasilitas === 'Kloset Jongkok')
                                        <img style="filter: grayscale(100%); width: 20px; height: 20px;"
                                            data-v-3d87c57a="" data-testid="detail-kost-facility__icon"
                                            alt="Kloset Jongkok" class="detail-kost-facility-item__icon-image"
                                            data-src="https://static.mamikos.com/uploads/tags/7JtETpII.png"
                                            src="https://static.mamikos.com/uploads/tags/7JtETpII.png" lazy="loaded">
                                        @endif

                                        <div class="text-lg ml-2">
                                            {{ $fasilitas }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
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
                        <div class="flex flex-col md:flex-row">
                            <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}"
                                alt="Example Image" class="rounded-full h-14 w-14 md:h-16 md:w-16">

                            <div class="md:ml-4 mt-2 md:mt-0">
                                <div class="font-semibold text-lg">
                                    {{$review->user_name}}
                                </div>
                                <div class="flex items-center">
                                    <svg class="h-4 w-4 md:h-5 md:w-5 black" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
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

                        <div class="mt-4 md:mt-0">
                            <div class="ml-0 md:ml-16 px-3 text-justify">
                                {{$review->review_description}}
                            </div>
                        </div>

                        <div class="w-full border-gray-300 border mt-8"></div>
                    </div>
                    @endforeach
                    @else
                    <div class="mt-8">
                        <div>
                            No reviews available
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
                        @auth
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
                        @endauth

                    </div>
                    
                    <div class="mt-5"></div>
                    <div class="border border-gray-300 py-5">
   
                        <form method="POST" action="{{ route('store.transaction', ['id' => $service->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="mx-4 mt-2 text-stone-900 text-left text-xl font-semibold flex">
                                Rp{{ number_format($service->harga_per_bulan, 0, ',', '.') }} (Bulan pertama)
                               
                            </div>
                            
                            <div class="flex">
                                <div class="relative w-2/5 mx-4 mt-4">
                                    <!-- <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div> -->
                                    <!-- <input datepicker datepicker-autohide id="date" name="date" type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mulai Kos"> -->


                                    <input id="date" name="date" type="date">
                                </div>
                                <div class="relative w-2/5 mx-4 mt-4">
                                    <select id="lama_sewa" name="lama_sewa" class= "form-control bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Pilih Lama Sewa</option>
                                        <option value="1">Per Bulan</option>
                                        <option value="3">Per 3 Bulan</option>
                                        <option value="6">Per 6 Bulan</option>
                                        <option value="12">Per Tahun</option>
                                    </select>
                                </div>
                            </div>

                            @error('date')
                                <p class="text-red-500 text-lg italic">{{ $message }}</p>
                            @enderror

                            @error('lama_sewa')
                                <p class="text-red-500 text-lg italic">{{ $message }}</p>
                            @enderror
                            
                            <div class="mx-4 mt-5 text-3xl font-bold underline" id="totalHargaContainer" style="display: none;">
                                Total Harga: <span id="totalHarga"></span>
                            </div>
                            
                            <input type="hidden" name="harga_total" id="harga_total">
                            
                            @if(auth()->check())
                                @if(auth()->user()->isSeller())
                                    <div class="text-red-500 w-4/5 mx-4 mt-8 text-xl font-semibold">
                                        Login atau registrasi sebagai pencari kos untuk melakukan transaksi
                                    </div>
                                    
                                @elseif(auth()->user()->isAdmin())
                                    <div class="text-red-500 w-4/5 mx-4 mt-8 text-xl font-semibold">
                                        Login atau registrasi sebagai pencari kos untuk melakukan transaksi
                                    </div>
                                @else
                                    <div class="flex place-content-center mt-5">
                                        <button type="submit"
                                            class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-sm text-sm px-36 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mx-4 mb-2">
                                            Continue
                                        </button>
                                    </div>
                                @endif
                            @else
                                    <div class="text-red-500 w-4/5 mx-4 mt-8 text-xl font-semibold">
                                        Login atau registrasi sebagai pencari kos untuk melakukan transaksi
                                    </div>
                            @endif
                            
                            

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        // Get references to the date input and select elements
        var dateInput = document.getElementById('date');
        var selectElement = document.getElementById('lama_sewa');
        var totalHargaContainer = document.getElementById('totalHargaContainer');
        var totalHargaInput = document.getElementById('harga_total');
        // Add event listeners to both elements
        dateInput.addEventListener('change', handleSelectionChange);
        selectElement.addEventListener('change', handleSelectionChange);

        function handleSelectionChange() {
            // Get the selected value from the select element
            var selectedOption = parseInt(selectElement.value);

            // Get the date value (you may need to parse it into a format suitable for calculation)
            var dateValue = dateInput.value;

            // Check if both date and bulan are selected
            if (selectedOption && dateValue) {
                // Perform your calculation based on the selected option and date value
                // For this example, I'll just multiply the selected option by a constant value
                var hargaPerBulan = {{$service->harga_per_bulan}};
                var totalHarga = selectedOption * hargaPerBulan;
                totalHargaInput.value = totalHarga;

                console.log(totalHarga);
                // Display the calculated total harga
                document.getElementById('totalHarga').innerText = 'Rp' + number_format(totalHarga, 0, ',', '.');

                // Show the total harga container
                totalHargaContainer.style.display = 'block';
            } else {
                // Hide the total harga container if either date or bulan is not selected
                totalHargaContainer.style.display = 'none';
            }
        }

        // Function to format numbers
        function number_format(number, decimals, decPoint, thousandsSep) {
            decimals = decimals || 0;
            number = parseFloat(number);

            if (!decPoint || !thousandsSep) {
                decPoint = '.';
                thousandsSep = ',';
            }

            var roundedNumber = Math.round(Math.abs(number) * ('1e' + decimals)) + '';
            var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
            var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
            var formattedNumber = "";

            while (numbersString.length > 3) {
                formattedNumber += thousandsSep + numbersString.slice(-3);
                numbersString = numbersString.slice(0, -3);
            }

            return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
        }
    });
    </script>

</x-app-layout>