<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="w-3/5 mb-5">
            <div class="text-2xl mt-5">
                {{ __("User Skill") }}
            </div>
            <div class="mt-5 mb-5 w-3/5 border border-gray-300"></div>
            <div>
                <form method="POST" action="{{ route('skill.store', ['id_skill' => Auth::user()->id] ) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="m-3">
                        <x-input-label for="skill" :value="__('Skill name')"/>
                        <x-text-input id="skill" name="skill" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="skill" />
                        <x-input-error class="mt-2" :messages="$errors->get('skill')" />
                    </div>

                    <div class="m-3">
                        <x-input-label for="experience_level" :value="__('Experience level')"/>
                        <x-text-input id="experience_level" name="experience_level" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="experience_level" />
                        <x-input-error class="mt-2" :messages="$errors->get('experience_level')" />
                    </div>

                    <x-primary-button class="mt-5 ml-3">{{ __('Create') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>