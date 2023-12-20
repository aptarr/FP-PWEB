<x-app-layout>

<div class="mt-8 flex items-center justify-center">
    <form method="POST" action="{{ route('service.store', ['user_id' => Auth::user()->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="w-full">
            <div class="text-2xl">
                {{ __("Isi Detail Kost") }}
            </div>
            <div class="mt-5 mb-5 w-full border border-gray-300"></div>

            <div class=" border-gray-200 bg-white border p-6 mt-3">

                <div class="w-full flex">
                    <div class="w-1/3">
                        <div class="font-bold">
                            {{ __("Nama Kost") }}
                        </div>
                        <div class="mt-2 w-4/5">
                            {{ __("Tulis nama kost mu sesuai deskripsi yang kamu inginkan. Nama kost yang unik akan menarik lebih banyak pelanggan.") }}
                        </div>  
                    </div>
                    <div class="w-2/3">
                        <div class="col-span-full">
                            <div class="relative">
                                <textarea id="title" name="title" rows="6" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Kost ITS 555"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                @error('title')
                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                @enderror

                <div class="w-full flex mt-7">
                        <div class="w-1/3">
                            <div class="font-bold">
                                {{ __("Lokasi Kost") }}
                            </div>
                            <div class="mt-2 w-4/5">
                                {{ __("Pilih di lokasi mana kost mu berada.") }}
                            </div>  
                        </div>
                        <div class="w-2/3 flex">
                           
                            <div class="font-semibold text-l text-gray-800 leading-tight w-2/5">
                                <label for="subcategory_id"><h4> {{ __("Lokasi Kost :") }} </h4></label>
                                <select class="mt-1 form-control border-gray-300 w-full rounded-md" id="subcategory_id" name="subcategory_id">
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                    @error('subcategory')
                        <p class="text-red-500 text-lg italic">{{ $message }}</p>
                    @enderror
                </div>


                <div class="w-full flex mt-7">
                    <div class="w-1/3">
                            <div class="font-bold">
                                {{ __("Fasilitas Kost") }}
                            </div>
                            <div class="mt-2 w-4/5">
                                {{ __("Pilih fasilitas sesuai dengan kost mu.") }}
                            </div>  
                    </div>
                    <div class="w-2/3 flex">
                        @php
                            $fasilitas = ['K. Mandi Dalam', 'Air Panas', 'Lemari Baju', 'AC', 'Kursi', 'Jendela', 'Kloset Duduk', 'Kasur', 'TV', 'Meja', 'Kipas Angin', 'Termasuk Listrik', 'WiFi', 'Mesin Cuci'];
                        @endphp

                        <div class="font-semibold text-l text-gray-800 leading-tight w-2/5">
                            <label><h4>{{ __("Fasilitas Kost :") }}</h4></label>
                            <div class="mt-2">
                                @foreach ($fasilitas as $fasilitasOption)
                                    <label class="flex items-center">
                                        <input type="checkbox" class="form-checkbox" name="fasilitas_kost[]" value="{{ $fasilitasOption }}">
                                        <span class="ml-2">{{ $fasilitasOption }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>



                <div class="w-full flex mt-7">
                    <div class="w-1/3">
                            <div class="font-bold">
                                {{ __("Fasilitas Kamar Mandi") }}
                            </div>
                            <div class="mt-2 w-4/5">
                                {{ __("Pilih fasilitas kamar mandi sesuai dengan kost mu.") }}
                            </div>  
                    </div>
                    <div class="w-2/3 flex">
                        @php
                            $fasilitas = ['Ember Mandi', 'Kloset Duduk', 'Shower' ];                        
                        @endphp

                        <div class="font-semibold text-l text-gray-800 leading-tight w-2/5">
                            <label><h4>{{ __("Fasilitas Kamar Mandi :") }}</h4></label>
                            <div class="mt-2">
                                @foreach ($fasilitas as $fasilitasOption)
                                    <label class="flex items-center">
                                        <input type="checkbox" class="form-checkbox" name="fasilitas_kamar_mandi[]" value="{{ $fasilitasOption }}">
                                        <span class="ml-2">{{ $fasilitasOption }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="w-full flex mt-7">
                    <div class="w-1/3">
                            <div class="font-bold">
                                {{ __("Harga Kost Per Bulan") }}
                            </div>
                            <div class="mt-2 w-4/5">
                                {{ __("Tetapkan harga kost per bulan.") }}
                            </div>  
                    </div>
                    <div class="w-2/3 flex">

                        <div class="font-semibold text-l text-gray-800 leading-tight w-2/5">
                            <div class="w-3/5">
                                    <label for="harga_per_bulan"><h4>{{ __("Harga Per Bulan :") }}</h4></label>
                                    <input type="number" class="mt-1 form-control border-gray-300 w-full rounded-md" id="harga_per_bulan" name="harga_per_bulan" />
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="w-full flex mt-7">
                    <div class="w-1/3">
                            <div class="font-bold">
                                {{ __("Jumlah Kamar Tersedia") }}
                            </div>
                            <div class="mt-2 w-4/5">
                                {{ __("Tetapkan total kamar yang sedang tersedia.") }}
                            </div>  
                    </div>
                    <div class="w-2/3 flex">

                        <div class="font-semibold text-l text-gray-800 leading-tight w-2/5">
                            <div class="w-3/5">
                                    <label for="kamar_tersedia"><h4>{{ __("Kamar Tersedia :") }}</h4></label>
                                    <input type="number" class="mt-1 form-control border-gray-300 w-full rounded-md" id="kamar_tersedia" name="kamar_tersedia" />
                            </div>
                        </div>
                        
                    </div>
                </div>

                </div>
            </div>
  

            <div class="text-2xl mt-10">
                {{ __("Deskripsi Kost") }}
            </div>
            <div class="mt-5 mb-5 w-full border border-gray-300"></div>

            <div>
                <div>
                    {{ __("Deskripsikan kostmu secara singkat") }}
                </div>
                <div class="mt-3">
                    <div class="relative">
                        <textarea id="description" name="description" rows="3" class="block w-full h-60  border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6"></textarea>
                    </div>
                </div>
                @error('description')
                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                @enderror
            </div>


            <div class="text-2xl mt-10">
                {{ __("Foto Kost") }}
            </div>
            <div class="mt-5 mb-5 w-full border border-gray-300"></div>

            <div>
                <div>
                    Tambahkan foto untuk kostmu
                </div>
                <div class="mb-4">
                    <input type="file" name="image" id="image" class="p-2 border border-gray-300 rounded">
                    @error('image')
                        <p class="text-red-500 text-lg italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-24 mb-5 w-full flex justify-end">
                <button type="submit" class="focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  dark:hover:bg-green-700 dark:focus:ring-green-800">
                    {{ __("Tambah Kost") }}
                </button>
            </div>
    </form>
</div>

</x-app-layout>