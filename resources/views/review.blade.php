<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="w-3/5 mb-5">
            <div class="text-2xl mt-5">
                {{ __("Review Service") }}
            </div>
            <div class="mt-5 mb-5 w-3/5 border border-gray-300"></div>
            <div>
                <form method="POST" action="{{ route('review.store', ['id' => $id, 'transaction_id' => $transaction_id] ) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="m-3">
                        <x-input-label for="rating_star" :value="__('Rating (1 - 5)')"/>
                        <input type="number" name="rating_star" class="mt-2" min="0" max="5">
                    </div>

                    <div class="m-3">
                        <x-input-label for="review_description" :value="__('Review Description')"/>
                        <x-text-input id="review_description" name="review_description" type="text" class="mt-1 block w-2/5" required autofocus autocomplete="review_description" />
                        <x-input-error class="mt-2" :messages="$errors->get('review_description')" />
                    </div>

                    <x-primary-button class="mt-5 ml-3">{{ __('Send Review') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>