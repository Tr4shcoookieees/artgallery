@php
    $defaults = [];
    for ($i = 1; $i <= 6; $i++) {
        $defaults[] = asset("assets/icons/Profile default avatar $i.png");
    }

    $picker = rand(1, 5);
    $link = $defaults[$picker];
@endphp

<img src="{{$link}}" alt="avatar" {{$attributes->merge(['class' => 'rounded-2xl border-2 border-gray-400'])}}>
