@props([
    'categories',
    'alpine'
])

<div x-data="{$alpine: false}" {{ $attributes }}>
    <div class="flex cursor-pointer items-center justify-between px-5 py-3 bg-zinc-600 bg-opacity-40"
         x-data="{rotated: false}"
         @click="$alpine = !$alpine; rotated = !rotated">
        <span class="uppercase">{{$alpine}}</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" fill="none"
             x-bind:style="{transform: rotated ? 'rotate(180deg)' : ''}">
            <path d="M1.4 7.4L0 6L6 0L12 6L10.6 7.4L6 2.8L1.4 7.4Z" fill="black"/>
        </svg>
    </div>
    <ul x-show="$alpine">
        @foreach($categories as $category)
            <li class="px-5 py-3">{{$category->translations[\App::getLocale()]}}</li>
        @endforeach
    </ul>
</div>
