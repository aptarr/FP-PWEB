
<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="w-3/5 mb-5">
            <div class="text-2xl mt-5">
                {{ __("User Language") }}
            </div>
            <div class="mt-5 mb-5 w-3/5 border border-gray-300"></div>
            <div>
                <form method="POST" action="{{ route('language.update', ['id_language' => $userLanguage->id] ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="m-3">
                        <x-input-label for="language" :value="__('Language name')"/>
                        <x-text-input id="language" name="language" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="language" :value="$userLanguage->language" />
                        <x-input-error class="mt-2" :messages="$errors->get('language')" />
                    </div>

                    <div class="m-3">
                        <x-input-label for="language_level" :value="__('Language level')"/>
                        <x-text-input id="language_level" name="language_level" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="language_level" :value="$userLanguage->language_level"/>
                        <x-input-error class="mt-2" :messages="$errors->get('language_level')" />
                    </div>

                    <x-primary-button class="mt-5 ml-3">{{ __('Create') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>