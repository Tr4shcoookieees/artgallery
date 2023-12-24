<div class="flex flex-col gap-y-2">
    <p>
        {{__($activity->text, ['order' => $activity->data['order'], 'old_status' => ucfirst($activity->data['old_status']), 'new_status' => ucfirst($activity->data['new_status'])])}}
    </p>
    <div class="flex items-center justify-between">
        <a class="text-blue-400 font-medium hover:underline" href="{{route('order.edit', $activity->data['order'])}}">
            {{__('Order #:order', ['order' => $activity->data['order']])}}
        </a>

        <span class="text-sm text-slate-600 font-light">{{__('At:')}} {{$activity->data['datetime']}}</span>
    </div>
</div>
