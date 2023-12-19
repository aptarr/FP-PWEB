<x-app-layout>
    @if(session('success'))
        <div class="flex items-center justify-center w-full h-8 py-auto bg-green-300 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex-col w-2/5 m-8">
                    <div class="flex-col align-center ">
                        <div class="bg-white p-5 border-gray-300 border">
                            @if(isset($user->image))
                                <img src="{{ asset(Storage::url($user->image)) }}" class="w-40 h-40 rounded-full bg-white border-2 mx-auto" alt="image-service">
                            @else
                                <img class="w-40 h-40 rounded-full bg-white border-2 mx-auto" src="https://www.svgrepo.com/show/396909/letter-s.svg" alt="Rounded avatar">
                            @endif
                            <div class="text-3xl">
                                <h1 class="text-center">{{ $user->name }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-300 mt-6 px-4">
                        <div class="py-4">
                                <div class="mb-4">
                                    <div class="flex">
                                        <div class="w-1/2 text-left font-semibold">
                                            <h3>Mengenai penyewa kos</h3>
                                        </div>

                                    </div>
                                    <p>
                                        {{ $user->description }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <div class="w-1/2 text-left font-semibold">
                                        Member sejak:
                                    </div>
                                    <div class="w-1/2 text-right">
                                        {{ Auth::user()->created_at->format('j F Y') }}
                                    </div>
                                </div>
                            </div>
                        <!-- <div class="flex-col align-center my-5">
                            <div class="flex font-semibold">
                                <div class="w-1/2 text-left">
                                    <h3>Languages</h3>
                                </div>
                            </div>
                            @foreach($languages as $language)
                                <div class="flex my-2">
                                        <div class="w-3/4 flex text-left">
                                            <p>{{ $language->language }}</p>
                                            <p class="text-gray-600 italic">|{{ $language->language_level }}</p>
                                        </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex-col align-center my-5">
                            <div class="flex font-semibold">
                                <div class="w-1/2 text-left">
                                    <h3>Skills</h3>
                                </div>
                            </div>
                            @foreach($skills as $skill)
                                <div class="flex my-2">
                                        <div class="w-3/4 flex text-left">
                                            <p>{{ $skill->skill }}</p>
                                            <p class="text-gray-600 italic">|{{ $skill->experience_level }}</p>
                                        </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex-col align-center my-5">
                            <div class="flex font-semibold">
                                <div class="w-1/2 text-left">
                                    <h3>Education</h3>
                                </div>
                            </div>
                            @foreach($educations as $education)
                                <div class="flex my-2">
                                        <div class="w-3/4 flex text-left">
                                            <div class="flex-col">
                                                <div>
                                                    <p> {{ $education->country_of_college }} ({{ $education->year }})</p>
                                                </div>
                                                <div class="flex">
                                                    <p>{{ $education->major }}</p>
                                                    <p class="text-gray-600 italic">|{{ $education->title }}</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex-col align-center my-5">
                            <div class="flex font-semibold">
                                <div class="w-1/2 text-left">
                                    <h3>Certification</h3>
                                </div>
                            </div>
                            @foreach($certifications as $certification)
                                <div class="flex my-2">
                                        <div class="w-3/4 flex text-left">
                                            <p>{{ $certification->certificate_name }}</p>
                                            <p class="text-gray-600 italic">|{{ $certification->certification_from }}</p>
                                        </div>
                                </div>
                            @endforeach
                        </div> -->
                    </div>

                </div>




                <div class="flex-col w-3/5 m-8 bg-white border border-gray-300">
                    <div class="flex justify-center align-middle font-semibold text-3xl p-4">
                        <div>
                        {{ __("Daftar Kost") }}
                        </div>

                    </div>
                    <div class="px-10">
                        @foreach($services as $service)
                            <div class="w-full h-48 flex rounded border border-gray-300 my-5">
                                <div class="relative flex-shrink-0 w-48 h-48 overflow-hidden">
                                    <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}" class="text-decoration-none">
                                    @if(isset($service->image))
                                        <img src="{{ Storage::url($service->image) }}" class="object-cover w-full h-full" alt="image-service">
                                    @else
                                        <img src="{{ asset('images/Thinker-Auguste-Rodin-Museum-Paris-1904.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    @endif
                                    </a>
                                </div>

                                <div class="flex-col p-5">
                                    <div class="text-xl font-semibold flex">
                                        <a href="{{ route('service.show', ['id' => $service->id, 'user_id' => $service->user_id]) }}" class="text-decoration-none hover:underline">
                                            <p>
                                                {{ $service->title}}
                                            </p>
                                        </a>
                                    </div>
                                    <div class=" w-full h-24 text-clip overflow-hidden">
                                        <p class="text-justify">
                                            {{ $service->description }}
                                        </p>
                                    </div>
                                    <div class="mt-4 flex items-center">
                                        <svg class="h-4 w-4 black width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <path d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873" fill="currentColor" />
                                        </svg>
                                        <div class="ml-1">
                                            {{ number_format($service->avg_star_rating, 1) }}
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
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
