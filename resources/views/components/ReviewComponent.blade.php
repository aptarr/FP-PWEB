<!-- resources/views/components/ReviewComponent.blade.php -->

<div class="mt-8">
    <div class="flex">
        <img src="{{ $image }}" alt="Example Image" class="rounded-full h-14 w-14">
        <div>
            <div class="ml-4 font-semibold text-lg">
                {{ $name }}
            </div>
            <div class="ml-4 flex items-center">
                <svg class="h-4 w-4 black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <path d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873" fill="currentColor" />
                </svg>
                <div class="ml-1">
                    {{ $rating }}
                </div>
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="ml-16 px-3 text-justify">
            {{ $content }}
        </div>
    </div>  
    <div class="w-full border-gray-300 border mt-8"></div>
</div>
