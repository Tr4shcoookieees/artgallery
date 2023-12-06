@props([
    'type'
])

<button type="{{$type}}" {{ $attributes->class(['select-none bg-black px-5 py-4 font-light text-white outline-2 outline-black transition-colors duration-300 -outline-offset-1 hover:bg-white hover:text-black hover:outline ']) }}>{{$slot}}</button>
