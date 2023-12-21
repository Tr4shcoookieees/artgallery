@props(['disabled' => false, 'value'])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '']) !!}>
    {{$value ?? $slot}}
</textarea>
