@props([
    'oauthCallbackLink',
    'title'
])

<a href="{{$oauthCallbackLink}}" {{ $attributes->merge(['class' => 'text-lg']) }}>
    <figure class="flex items-center justify-center gap-x-2 bg-red-500 py-2 text-white rounded-sm">
        {{$slot}}
        <figcaption>
            <p>{{$title}}</p>
        </figcaption>
    </figure>
</a>
