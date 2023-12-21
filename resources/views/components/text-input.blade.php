@props(['disabled' => false])

<input {{$disabled ? 'disabled' : ''}} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-sm shadow-sm focus:border-red-300 focus:ring-red-300']) !!}>
