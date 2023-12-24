@php use App\Models\Activity;use Carbon\Carbon; @endphp
@extends('layouts.admin')

@section('content')
    <main class="space-y-14">
        <section class="w-full items-center justify-center rounded-xl bg-gradient-to-br from-red-500 to-amber-200 text-gray-100 shadow-lg white space-y-4">
            <header class="p-12">
                <h3 class="text-4xl font-medium">{{__('Greeting, :user', ['user' => auth()->user()->name])}}</h3>

                <div class="mt-4 inline-flex items-center text-lg space-x-4">
                    <p>{{__('You have :count unread messages', ['count' => 5])}}</p>
                    <x-untitledui-message-alert-circle class="h-7 w-7"/>
                </div>
            </header>
        </section>

        <div class="flex flex-nowrap gap-x-8">
            <section class="w-full max-w-3xl rounded-xl p-12 shadow-lg space-y-4">
                <header>
                    <h3 class="text-lg font-medium">{{__('Last Activity')}}</h3>

                    <div class="mt-4 space-y-4 max-h-[280px] overflow-y-scroll scrollbar-thin scrollbar-track-slate-400">
                        @foreach(Activity::orderByDesc('created_at')->limit(15)->get() as $activity)
                            <div class="rounded-lg border border-gray-200 p-4 space-y-2">
                                @include('activities.'.$activity->type, ['activity' => $activity])
                            </div>
                        @endforeach
                    </div>
                </header>
            </section>
            <section class="w-full max-h-full rounded-xl p-12 shadow-lg space-y-4">
                <header>
                    <h3 class="text-lg font-medium">{{__('Number of artworks depending on category')}}</h3>

                    <div class="mt-4 space-y-4">
                        <canvas class="rounded-lg border border-gray-200 p-4 space-y-2 max-h-96" id="myChart"></canvas>
                    </div>
                </header>
            </section>
        </div>
    </main>
@endsection

@section('scripts')
    @vite('resources/js/categoryChart.js')
@endsection
