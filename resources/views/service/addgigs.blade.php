<x-app-layout>

<div class="mt-8 flex items-center justify-center">
    <form method="POST" action="{{ route('service.store', ['user_id' => Auth::user()->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="w-3/5">
            <div class="text-2xl">
                {{ __("Overview") }}
            </div>
            <div class="mt-5 mb-5 w-full border border-gray-300"></div>
            <div class=" border-gray-200 bg-white border p-6 mt-3">
                <div class="w-full flex">
                    <div class="w-1/3">
                        <div class="font-bold">
                            {{ __("Gig title") }}
                        </div>
                        <div class="mt-2 w-4/5">
                            {{ __("As your Gig storefront, your title is the most important place to include keywords that buyers would likely use to search for a service like yours.") }}
                        </div>  
                    </div>
                    <div class="w-2/3">
                        <div class="col-span-full">
                            <div class="relative">
                                <textarea id="title" name="title" rows="6" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="I will do something about"></textarea>
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
                            {{ __("Category") }}
                        </div>
                        <div class="mt-2 w-4/5">
                            {{ __("Choose the category and sub-category most suitable for your Gig.") }}
                        </div>  
                        </div>
                        <div class="w-2/3 flex">
                            <div class="font-semibold text-l text-gray-800 leading-tight w-2/5">
                                <label for="category_id"><h4> {{ __("Category :") }} </h4></label>
                                <select class="mt-1 form-control border-gray-300 w-full rounded-md" id="category_id" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="font-semibold text-l text-gray-800 leading-tight w-2/5 ml-20">
                                <label for="subcategory_id"><h4> {{ __("Sub Category :") }} </h4></label>
                                <select class="mt-1 form-control border-gray-300 w-full rounded-md" id="subcategory_id" name="subcategory_id">
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @error('category')
                        <p class="text-red-500 text-lg italic">{{ $message }}</p>
                    @enderror
                    @error('subcategory')
                        <p class="text-red-500 text-lg italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="text-2xl mt-10">
                {{ __("Scope & Pricing") }}
            </div>

            <div class="mt-5 mb-5 w-full border border-gray-300"></div>
            <div class=" border-gray-200 bg-white border mt-3">
                <div class="w-full flex items-center">
                    <div class="w-1/4   flex items-center justify-center">
                        {{ __("Packages") }}
                    </div>
                    <div class="w-full">
                        <div class="w-full flex">
                            <div class="h-20 w-1/3 border bg-gray-100 border-gray-200 flex items-center justify-center font-semibold">
                                {{ __("BASIC") }}
                            </div>
                            <div class="w-1/3 border bg-gray-100 border-gray-200 flex items-center justify-center font-semibold">
                                {{ __("STANDARD") }}
                            </div>
                            <div class="w-1/3 border bg-gray-100 border-gray-200 flex items-center justify-center font-semibold">
                                {{ __("PREMIUM") }}
                            </div>
                        </div>
                        <div class="w-full flex">
                            <div class="h-20 w-1/3 border  border-gray-200 flex items-start">
                                <input type="text" name="basic_plan_title" id="packagetitlebasic" autocomplete="packagetitlebasic" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Name your package">
                            </div>
                            <div class="w-1/3 border  border-gray-200 flex items-start">
                                <input type="text" name="standard_plan_title" id="packagetitlestandard" autocomplete="packagetitlestandard" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Name your package">
                            </div>
                            <div class="w-1/3 border  border-gray-200 flex items-start">
                                <input type="text" name="premium_plan_title" id="packagetitlepremium" autocomplete="packagetitlepremium" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Name your package">
                            </div>
                        </div>

                        <div class="w-full flex">
                            <div class="h-20 w-1/3 border border-gray-200 flex items-start">
                                <input type="text" name="basic_plan_description" id="descriptionbasic" autocomplete="descriptionbasic" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Describe the details of your offering">
                            </div>
                            <div class="w-1/3 border  border-gray-200 flex items-start">
                                <input type="text" name="standard_plan_description" id="descriptionstandard" autocomplete="descriptionstandard" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Describe the details of your offering">
                            </div>
                            <div class="w-1/3 border  border-gray-200 flex items-start">
                                <input type="text" name="premium_plan_description" id="descriptionpremium" autocomplete="descriptionpremium" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Describe the details of your offering">
                            </div>
                        </div>

                        <div class="w-full flex">
                            <div class="w-1/3 border border-gray-200 flex items-start">
                                <select class="mt-1 form-control border-0 w-full" name="basic_plan_days" id="basic_plan_days">
                                    <option class="hidden" value="" selected disabled>DELIVERY TIME</option>
                                    <option value="1">1 DAY DELIVERY</option>
                                    <option value="2">2 DAYS DELIVERY</option>
                                    <option value="3">3 DAYS DELIVERY</option>
                                    <option value="4">4 DAYS DELIVERY</option>
                                    <option value="5">5 DAYS DELIVERY</option>
                                    <option value="6">6 DAYS DELIVERY</option>
                                    <option value="7">7 DAYS DELIVERY</option>
                                    <option value="10">10 DAYS DELIVERY</option>
                                    <option value="14">14 DAYS DELIVERY</option>
                                    <option value="21">21 DAYS DELIVERY</option>
                                    <option value="30">30 DAYS DELIVERY</option>
                                    <option value="45">45 DAYS DELIVERY</option>
                                    <option value="60">60 DAYS DELIVERY</option>
                                    <option value="75">75 DAYS DELIVERY</option>
                                    <option value="90">90 DAYS DELIVERY</option>
                                </select>
                            </div>
                            <div class="w-1/3 border  border-gray-200 flex items-start">
                                <select class="mt-1 form-control border-0 w-full" name="standard_plan_days" id="standard_plan_days">
                                    <option class="hidden" value="" selected disabled>DELIVERY TIME</option>
                                    <option value="1">1 DAY DELIVERY</option>
                                    <option value="2">2 DAYS DELIVERY</option>
                                    <option value="3">3 DAYS DELIVERY</option>
                                    <option value="4">4 DAYS DELIVERY</option>
                                    <option value="5">5 DAYS DELIVERY</option>
                                    <option value="6">6 DAYS DELIVERY</option>
                                    <option value="7">7 DAYS DELIVERY</option>
                                    <option value="10">10 DAYS DELIVERY</option>
                                    <option value="14">14 DAYS DELIVERY</option>
                                    <option value="21">21 DAYS DELIVERY</option>
                                    <option value="30">30 DAYS DELIVERY</option>
                                    <option value="45">45 DAYS DELIVERY</option>
                                    <option value="60">60 DAYS DELIVERY</option>
                                    <option value="75">75 DAYS DELIVERY</option>
                                    <option value="90">90 DAYS DELIVERY</option>
                                </select>
                            </div>
                            <div class="w-1/3 border  border-gray-200 flex items-start">
                                <select class="mt-1 form-control border-0 w-full" name="premium_plan_days" id="premium_plan_days">
                                    <option class="hidden" value="" selected disabled>DELIVERY TIME</option>
                                    <option value="1">1 DAY DELIVERY</option>
                                    <option value="2">2 DAYS DELIVERY</option>
                                    <option value="3">3 DAYS DELIVERY</option>
                                    <option value="4">4 DAYS DELIVERY</option>
                                    <option value="5">5 DAYS DELIVERY</option>
                                    <option value="6">6 DAYS DELIVERY</option>
                                    <option value="7">7 DAYS DELIVERY</option>
                                    <option value="10">10 DAYS DELIVERY</option>
                                    <option value="14">14 DAYS DELIVERY</option>
                                    <option value="21">21 DAYS DELIVERY</option>
                                    <option value="30">30 DAYS DELIVERY</option>
                                    <option value="45">45 DAYS DELIVERY</option>
                                    <option value="60">60 DAYS DELIVERY</option>
                                    <option value="75">75 DAYS DELIVERY</option>
                                    <option value="90">90 DAYS DELIVERY</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full flex items-center border border-gray-200">
                    <div class="w-1/4  flex items-center justify-center font-bold">
                            {{ __("Total Price") }}
                    </div>
                    <div class="w-full flex">
                        <div class="h-10 w-1/3 border border-gray-200 flex items-center">
                            <div class="ml-3 mr-1">$</div>
                            <input type="number" name="basic_plan_price" id="basic_plan_price" autocomplete="basic_plan_price" class="block border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 w-full">
                        </div>
                        <div class="w-1/3 border border-gray-200 flex items-center">
                            <div class="ml-3 mr-1">$</div>
                            <input type="number" name="standard_plan_price" id="standard_plan_price" autocomplete="standard_plan_price" class="block border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 w-full">
                        </div>
                        <div class="w-1/3 border border-gray-200 flex items-center">
                            <div class="ml-3 mr-1">$</div>
                            <input type="number" name="premium_plan_price" id="premium_plan_price" autocomplete="premium_plan_price" class="block border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 w-full">
                        </div>
                    </div>
                </div>
            </div>

            @error('basic_plan_days')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('basic_plan_description')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('basic_plan_price')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('basic_plan_title')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('standard_plan_days')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('standard_plan_description')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('standard_plan_price')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('standard_plan_title')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('premium_plan_days')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('premium_plan_description')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('premium_plan_price')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('premium_plan_title')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror

            <div class="text-2xl mt-10">
                {{ __("Description") }}
            </div>
            <div class="mt-5 mb-5 w-full border border-gray-300"></div>

            <div>
                <div>
                    {{ __("Briefly Describe Your Gig") }}
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
                {{ __("Image") }}
            </div>
            <div class="mt-5 mb-5 w-full border border-gray-300"></div>

            <div>
                <div>
                    Add an image for your gig
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
                    {{ __("Publish Gig") }}
                </button>
            </div>
    </form>
</div>

</x-app-layout>