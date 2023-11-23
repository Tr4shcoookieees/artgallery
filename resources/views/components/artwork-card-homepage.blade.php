@props([
    'author',
])

<a href="#">
    <div class="overflow-hidden">
        <img class="h-72 w-full scale-110 object-cover object-center transition-transform delay-75 duration-500 ease-in-out hover:scale-100" src="{{asset('assets/artworks/pic-wide.jpg')}}" alt="Artwork by John Doe">
    </div>
    <figcaption {{ $attributes->class(['absolute bg-white bg-opacity-20 bottom-2 right-2 p-1 text-sm font-light capitalize text-white']) }}>
        <span>&copy; {{$author}} </span>
    </figcaption>
</a>

