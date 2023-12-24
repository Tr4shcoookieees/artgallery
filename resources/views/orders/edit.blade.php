@php use App\Models\Status; @endphp
@extends('layouts.admin')

@section('content')
    <main class="md:px-14">

        <div class="rounded-2xl p-12 shadow-lg">
            <section class="space-y-6">
                <header class="flex gap-x-4">
                    <h3 class="font-medium text-lg">{{__('Order #:order details', ['order' => $order->id])}}</h3>
                    <x-status-code :order="$order"/>
                </header>

                <form action="{{ route('order.update', $order) }}" method="post" class="flex flex-nowrap gap-x-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4 w-full max-w-sm">
                        <div class="flex flex-col gap-y-1">
                            <x-input-label for="status" :value="__('Status')" required="true"/>
                            <x-select-input id="status" name="status" required>
                                @foreach(Status::get() as $status)
                                    <option value="{{$status->id}}" {{$status->id == $order->status_id ? 'selected' : ''}}>
                                        {{__(ucfirst($status->name))}}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                            @if(session('status') === 'status-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="mt-2 text-sm font-medium text-green-600">
                                    {{__('Updated')}}
                                </p>
                            @endif
                            @if(session('status') === 'status-unchanged')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="mt-2 text-sm font-medium text-amber-600">
                                    {{__('Status unchanged')}}
                                </p>
                            @endif
                        </div>

                        <div>
                            <x-primary-button :value="__('Update status')"/>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex flex-col gap-y-1">
                            <x-input-label :value="__('Product title')"/>
                            <p class="font-medium">{{$order->artwork->title}}</p>
                        </div>

                        <div class="flex flex-col gap-y-1">
                            <x-input-label :value="__('Product author')"/>
                            <p class="font-medium">{{$order->author->nickname}}</p>
                        </div>

                        <div class="flex flex-col gap-y-1">
                            <x-input-label :value="__('Product price')"/>
                            <p class="font-medium">{{$order->artwork->price}} </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </main>
@endsection


