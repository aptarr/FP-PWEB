<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="w-3/5 mb-5">
            <div class="text-2xl mt-5">
                {{ __("Report Service") }}
            </div>
            <div class="mt-5 mb-5 w-3/5 border border-gray-300"></div>
            <div>
                <form method="POST" action="{{ route('report.store', ['id' => $id] ) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="m-3">
                        <x-input-label for="report_type" :value="__('Rating (1 - 5)')"/>
                        <select class="mt-1 form-control border-gray-300 w-1/3 rounded-md" id="report_type" name="report_type">
                                <option value="Inappropriate">Inappropriate</option>
                                <option value="Explicit Content">Explicit Content</option>
                                <option value="Harassment">Harassment</option>
                                <option value="Spam">Spam</option>
                                <option value="Unrelated">Unrelated</option>
                        </select>
                    </div>

                    <div class="m-3">
                        <x-input-label for="report_description" :value="__('Report Description')"/>
                        <x-text-input id="report_description" name="report_description" type="text" class="mt-1 block w-3/5 " required autofocus autocomplete="report_description" />
                        <x-input-error class="mt-2" :messages="$errors->get('report_description')" />
                    </div>

                    <x-primary-button class="mt-5 ml-3">{{ __('Send Report') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>