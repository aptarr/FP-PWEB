
<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="w-3/5 mb-5">
            <div class="text-2xl mt-5">
                {{ __("User Education") }}
            </div>
            <div class="mt-5 mb-5 w-3/5 border border-gray-300"></div>
            <div>
                <form method="POST" action="{{ route('education.update', ['id_education' => $userEducation->id] ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="m-3">
                        <x-input-label for="country_of_college" :value="__('Country')"/>
                        <x-text-input id="country_of_college" name="country_of_college" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="country_of_college" :value="$userEducation->country_of_college" />
                        <x-input-error class="mt-2" :messages="$errors->get('country_of_college')" />
                    </div>

                    <div class="m-3">
                        <x-input-label for="title" :value="__('Title')"/>
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="title" :value="$userEducation->title"/>
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="m-3">
                        <x-input-label for="major" :value="__('Major')"/>
                        <x-text-input id="major" name="major" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="major" :value="$userEducation->major"/>
                        <x-input-error class="mt-2" :messages="$errors->get('major')" />
                    </div>

                    <div class="m-3">
                        <x-input-label for="year" :value="__('Year of Graduation')"/>
                        <x-text-input id="year" name="year" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="year" :value="$userEducation->year"/>
                        <x-input-error class="mt-2" :messages="$errors->get('year')" />
                    </div>

                    <x-primary-button class="mt-5 ml-3">{{ __('Create') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>