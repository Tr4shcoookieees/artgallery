@props([
    'artwork'
])

<figure {{ $attributes->class(['inline-block w-full mb-6']) }} class="">
    <a href="{{route('artworks.show', $artwork->id)}}">
        <div class="overflow-hidden">
            <img src="{{$artwork->image}}" alt="{{$artwork->title}}" class="w-full select-none scale-100 hover:scale-110 transition-transform duration-300 ease-in-out">
        </div>
        <figcaption class="mt-3">
            <p class="break-words text-lg font-medium capitalize">{{$artwork->author->nickname}}</p>
            <p class="capitalize">"{{$artwork->title}}"</p>
            <p class="mb-2 font-light">{{$artwork->category->translations[app()->getLocale()]}} | {{$artwork->width . 'x' . $artwork->height}}</p>
            <p class="font-medium">{{$artwork->price}} &#8381;</p>
        </figcaption>
    </a>
</figure>
