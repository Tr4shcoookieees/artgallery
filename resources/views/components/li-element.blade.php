@props([
    'value',
    'click',
    'select_class'
])

<li {{ $attributes->class(['p-4 rounded-sm select-none cursor-pointer hover:bg-gray-200']) }}
    @click="{{$click}}"
    :class="{{$select_class}}"
>
    {{$value ?? $slot}}
</li>
