@props([
    'author',
    'artwork'
])

<a href="{{route('artworks.show', $artwork->id)}}">
    <div class="overflow-hidden">
        <img class="h-72 w-full scale-100 object-cover object-center transition-transform delay-75 duration-500 ease-in-out hover:scale-110" src="{{$artwork->image}}" alt="Artwork by {{$author}}">
    </div>
    <figcaption {{ $attributes->class(['absolute bg-white bg-opacity-20 bottom-2 right-2 p-1 text-sm font-light capitalize text-white']) }}>
        <span>&copy; {{$author}} </span>
    </figcaption>
</a>

