@props(['event', 'color' => 0, 'class'])

<div class="{{$class ?? ''}}">
    <a href="/events/{{$event->id}}">
        <div class="bg-shortTab{{$color}}-secondary w-1 h-6 float-left"></div>
        <div class="bg-shortTab{{$color}}-primary w-full h-6 px-5">
            <p><strong>{{$event->name}}</strong></p>
        </div>
    </a>
</div>
