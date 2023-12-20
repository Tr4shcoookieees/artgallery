@props([
    'type'
])

<button type="{{$type}}" {{$attributes->class(['text-normal text-center p-3 bg-black text-white font-light'])}}>
    {{$slot}}
</button>
