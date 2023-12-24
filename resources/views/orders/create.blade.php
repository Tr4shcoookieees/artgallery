@extends('layouts.main')

@section('content')
    <main class="md:px-14">

        <div class="rounded-2xl p-12 shadow-lg">
            @if(session('error'))
                <section>
                    <header class="mb-6">
                        <h3 class="font-medium text-lg">{{__(session('error'))}}</h3>

                        <p>{{__('Unfortunately, this product is already sold out.')}}</p>
                    </header>

                    <x-primary-link :href="route('artworks.index')" :value="__('Catalog')"/>
                </section>
            @else
                <section>


                    <header class="mb-6">
                        <h3 class="font-medium text-lg">{{__('Order details')}}</h3>

                        <p class="mt-3">{{__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dolore pariatur quae quaerat repellendus temporibus ut. Animi culpa cum cumque debitis, delectus dolores modi molestiae non, nulla recusandae similique vel.')}}</p>
                    </header>

                    <form action="{{ route('order.store') }}" method="post" class="flex flex-nowrap gap-x-8">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="space-y-4 max-w-lg">
                            <div class="flex flex-col gap-y-1">
                                <x-input-label for="name" :value="__('Name')" required="true"/>
                                <x-text-input id="name" name="name" type="text" :value="old('name', auth()->user()->name)" autofocus required autocomplete="name"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>

                            <div class="flex flex-col gap-y-1">
                                <x-input-label for="email" :value="__('Email')" required="true"/>
                                <x-text-input id="email" name="email" type="email" :value="old('email', auth()->user()->email)" autofocus required autocomplete="email"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                            </div>

                            <div class="flex flex-col gap-y-1">
                                <x-input-label for="phone" :value="__('Phone')"/>
                                <x-text-input id="phone" name="phone" type="text" :value="old('phone', auth()->user()->phone)" autofocus required autocomplete="phone"/>
                                <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                            </div>

                            <div class="flex flex-col gap-y-1">
                                <x-input-label for="address" :value="__('Address')"/>
                                <x-text-input id="address" name="address" type="text" :value="old('address', auth()->user()->city->name . ', ' . auth()->user()->country->name)" autofocus required autocomplete="address"/>
                                <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                            </div>

                            <div>
                                <x-primary-button :value="__('Order')"/>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex flex-col gap-y-1">
                                <x-input-label :value="__('Product title')"/>
                                <p class="font-medium">{{$product->title}}</p>
                            </div>

                            <div class="flex flex-col gap-y-1">
                                <x-input-label :value="__('Product author')"/>
                                <p class="font-medium">{{$product->author->nickname}}</p>
                            </div>

                            <div class="flex flex-col gap-y-1">
                                <x-input-label :value="__('Product price')"/>
                                <p class="font-medium">{{$product->price}} </p>
                            </div>
                        </div>
                    </form>
                </section>
            @endif
        </div>

    </main>
@endsection
