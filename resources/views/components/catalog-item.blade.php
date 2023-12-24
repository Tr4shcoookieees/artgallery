@props([
    'artwork'
])

<figure {{ $attributes->class(['rounded-md inline-block w-full mb-12 hover:shadow-lg hover:scale-105 transition duration-300']) }} class="">
    <a href="{{route('artworks.show', $artwork->id)}}">
        <div class="overflow-hidden rounded-t-md">
            <img src="{{$artwork->image}}" alt="{{$artwork->title}}" class="w-full scale-100 select-none transition-transform duration-300 ease-in-out hover:scale-110">
        </div>
        <figcaption class="mt-3 p-4">
            <p class="break-words text-lg font-medium capitalize">{{$artwork->title}}</p>
            <p class="capitalize">"{{$artwork->author->nickname}}"</p>
            <p class="mb-2 font-light">{{__(ucfirst($artwork->category->name))}} | {{$artwork->width . 'x' . $artwork->height}}</p>
            <p class="font-medium">{{$artwork->price}} &#8381;</p>
        </figcaption>
    </a>
</figure>
