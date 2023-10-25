{{--@props([--}}
{{--    'author',--}}
{{--    'artwork'--}}
{{--])--}}

<a href="#">
    <div class="overflow-hidden">
        <img class="h-72 w-full object-cover object-center" src="{{asset('assets/artworks/pic-wide.jpg')}}" alt="Artwork by John Doe">
    </div>
    <figcaption {{ $attributes->class(['absolute bg-white bg-opacity-20 bottom-2 right-2 p-1 text-sm font-light capitalize text-white']) }}>
        <span>&copy; {{--{{$author->name}}--}} John Doe</span>
    </figcaption>
</a>

