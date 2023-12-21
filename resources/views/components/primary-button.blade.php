@props([
    'type' => 'submit',
    'value'
])

<button type="{{$type}}" {{$attributes->class(['min-w-[16ch] rounded-sm text-normal text-center p-3 bg-black text-white font-light hover:bg-opacity-80'])}}>
    {{$value ?? $slot}}
</button>
