@props(['event', 'color' => 0, 'class'])

<div class="{{$class ?? ''}}">
    <a href="{{route('events.show', $event->id)}}">
        <div class="bg-shortTab{{$color}}-secondary w-1 h-20 float-left"></div>
        <div class="bg-shortTab{{$color}}-primary w-full h-20 p-4">
            <p><strong>{{$event->name}}</strong></p>
            <p>
                {{$event->datestart->format("H:i")}} [{{$event->duration}}h]
            </p>
        </div>
    </a>
</div>
