@props(['disabled' => false])

<input {{$disabled ? 'disabled' : ''}} {!! $attributes->merge(['class' => 'border-gray-300 rounded-sm shadow-sm focus:border-red-300 focus:ring-red-300']) !!}>
