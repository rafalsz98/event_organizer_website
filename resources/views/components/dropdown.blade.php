@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}

@endphp

<div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div class=" justify-between h-10 md:h-12 lg:h-14 xl:h-16 flex items-center pr-1 sm:pr-5 cursor-pointer text-blue-500" @click="open = ! open">
            {{Auth::user()->name}}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">

        <div class="bg-white rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link onclick="event.preventDefault();this.closest('form').submit();">Logout</x-dropdown-link>
{{--                <a style="margin-left:4px;" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>--}}
            </form>
        </div>
    </div>
</div>
