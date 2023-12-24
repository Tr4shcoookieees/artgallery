@props([
    /** @var \App\Models\Order */
    'order'
])

<p {{ $attributes->class(['bg-opacity-40 min-w-min rounded-full px-2 py-1 ' . $order->status->color . '-300']) }}>{{ __(ucfirst($order->status->name)) }}</p>
