@props(["color"])

<div {{ $attributes(["class" => "flex-1 h-72 bg-opacity-10 rounded-2xl flex flex-col gap-10 px-auto items-center justify-center relative bg-$color"]) }}>
    {{ $slot }}

    <div class="bg-opacity-20 font-medium">
        {{ $title }}
    </div>

    <div class="text-5xl font-bold text-{{ $color }}">
        {{ $numbers }}
    </div>
</div>
