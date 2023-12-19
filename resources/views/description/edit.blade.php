
<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="w-3/5 mb-5">
            <div class="text-2xl mt-5">
                {{ __("User Education") }}
            </div>
            <div class="mt-5 mb-5 w-3/5 border border-gray-300"></div>
            <div>
                <form method="POST" action="{{ route('description.update', ['id_user' => $user->id] ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="m-3">
                        <x-input-label for="description" :value="__('Description')"/>
                        <x-text-input id="description" name="description" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="description" :value="$user->description" />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <x-primary-button class="mt-5 ml-3">{{ __('Create') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>