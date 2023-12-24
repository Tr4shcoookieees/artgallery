@extends('layouts.main')

@section('content')
    <main class="h-max grid auto-rows-auto grid-cols-2 gap-8 md:px-14">
        @forelse($orders as $order)
            <div class="w-full rounded border border-gray-200 p-6 shadow space-y-8"
                 x-data="{ order: false, height: '100px' }"
                 :style="{'height': height}"
            >
                <div class="" @click="order = !order; height = order ? 'auto' : '100px'">
                    <h2 class="text-lg font-bold">#{{ $order->id }}</h2>
                    <div class="flex items-center gap-x-2 text-sm text-gray-500">
                        <p>{{ $order->created_at->format('d/m/Y') }}</p>
                        <x-status-code :order="$order"/>
                    </div>
                </div>
                <div class="flex flex-wrap gap-8"
                     x-show="order"
                >
                    <div class="space-y-2">
                        <p class="text-lg font-medium">{{__('Product title')}}</p>
                        <p class="text-gray-600">{{$order->artwork->title}}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-lg font-medium">{{__('Price')}}</p>
                        <p class="text-gray-600">{{$order->price}}</p>
                    </div>
                    <div>
                        <div class="space-y-2">
                            <p class="text-lg font-medium">{{__('Product image')}}</p>
                            <img src="{{$order->artwork->image}}" class="w-full rounded-md object-cover" alt="">
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-start-1 col-end-3 h-full w-full place-self-center flex items-center justify-center rounded border border-gray-200 shadow">
                <div class="p-4 text-center">
                    <h2 class="text-lg font-bold">{{__("You don't have any orders")}}</h2>
                    <a href="{{ route('artworks.index') }}" class="text-md mt-5 text-gray-500">
                        {{__('Check out catalog!')}}
                    </a>
                </div>
            </div>
        @endforelse
    </main>
@endsection
