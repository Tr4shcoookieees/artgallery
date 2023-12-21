<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-sm text-normal text-center p-3 bg-red-700 hover:bg-opacity-80 text-white font-light']) }}>
    {{ $slot }}
</button>
