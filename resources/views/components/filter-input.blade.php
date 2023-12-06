@props([
    /** @var App\Models\Category | App\Models\Style | App\Models\Theme $model */
    'model',
    'id_text',
    'type',
    'filter_name'
])

<li {{ $attributes->class(['px-5 py-3 flex items-center first-letter:uppercase bg-zinc-600 bg-opacity-10']) }} class="" id="{{$id_text}}">
    <input id="{{$id_text}}" value="{{$model->name}}" type="{{$type}}" name="{{$filter_name}}" class="mr-2 text-red-700 focus:ring-red-700" {{in_array($model->name, explode('%', request($filter_name))) ? 'checked' : ''}}>
    <label for="{{$id_text}}" class="flex items-center gap-x-2">
        <p>{{$model->translations[\App::getLocale()]}}</p>
        @if($filter_name === 'color')
            <div class="h-3 w-3 rounded-full border border-gray-400" style="background: {{$model->code}};"></div>
        @endif
    </label>
</li>
