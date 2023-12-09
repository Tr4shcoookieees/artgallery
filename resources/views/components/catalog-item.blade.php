@props([
    'artwork'
])

<figure {{ $attributes->class(['inline-block w-full mb-6 hover:scale-95 transition-transform duration-300 ease-in-out']) }} class="">
    <img src="{{$artwork->image}}" alt="{{$artwork->title}}" class="w-full select-none">
    <figcaption class="mt-3">
        <p class="break-words text-lg font-medium capitalize">{{$artwork->author->nickname}}</p>
        <p class="capitalize">"{{$artwork->title}}"</p>
        <p class="mb-2 font-light">{{$artwork->category->translations[\App::getLocale()]}} | {{$artwork->width . 'x' . $artwork->height}}</p>
        <p class="font-medium">{{$artwork->price}} &#8381;</p>
    </figcaption>
</figure>
