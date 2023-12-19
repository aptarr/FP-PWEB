@props(['align' => 'center', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'left-0';
        break;
    case 'top':
        $alignmentClasses = 'top-0';
        break;
    case 'right':
        $alignmentClasses = 'right-0';
        break;
    case 'center':
        $alignmentClasses = 'left-1/2 transform -translate-x-1/2';
        break;
    default:
        $alignmentClasses = 'right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
    case '64':
        $width = 'w-64';
        break;
    case '80':
        $width = 'w-80';
        break;
}
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
