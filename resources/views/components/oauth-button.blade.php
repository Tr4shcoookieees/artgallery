@props([
    'oauthCallbackLink',
    'title'
])

<a href="{{$oauthCallbackLink}}" {{ $attributes }}>
    <figure class="flex items-center justify-center gap-x-2 bg-red-500 py-2 text-white">
        {{$slot}}
        <figcaption>
            <p class="">{{$title}}</p>
        </figcaption>
    </figure>
</a>
