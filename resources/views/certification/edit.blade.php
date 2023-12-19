
<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="w-3/5 mb-5">
            <div class="text-2xl mt-5">
                {{ __("User Education") }}
            </div>
            <div class="mt-5 mb-5 w-3/5 border border-gray-300"></div>
            <div>
                <form method="POST" action="{{ route('certification.update', ['id_certification' => $userCertification->id] ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="m-3">
                        <x-input-label for="certificate_name" :value="__('Certificate Name')"/>
                        <x-text-input id="certificate_name" name="certificate_name" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="certificate_name" :value="$userCertification->certificate_name" />
                        <x-input-error class="mt-2" :messages="$errors->get('country_of_college')" />
                    </div>

                    <div class="m-3">
                        <x-input-label for="certification_from" :value="__('Origin of Certification')"/>
                        <x-text-input id="certification_from" name="certification_from" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="certification_from" :value="$userCertification->certification_from"/>
                        <x-input-error class="mt-2" :messages="$errors->get('certification_from')" />
                    </div>

                    <div class="m-3">
                        <x-input-label for="year" :value="__('Year of Graduation')"/>
                        <x-text-input id="year" name="year" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="year" :value="$userCertification->year"/>
                        <x-input-error class="mt-2" :messages="$errors->get('year')" />
                    </div>

                    <x-primary-button class="mt-5 ml-3">{{ __('Create') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>