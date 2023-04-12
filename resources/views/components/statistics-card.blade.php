@props(["color", "type" => "pr"])

@php
    if ($type === "pr") {
        $cardClass = "col-span-2 md:col-span-1 md:row-start-1";
    } else {
        $cardClass = "row-start-2 md:row-start-1";
    }
@endphp

    <div {{ $attributes(["class" => "h-72 bg-opacity-10 rounded-2xl flex flex-col gap-10 items-center justify-center bg-$color $cardClass"]) }}>
    {{ $slot }}

    <div class="bg-opacity-20 font-medium text-base lg:text-xl">
        {{ $title }}
    </div>

    <div class="font-bold text-{{ $color }} text-3xl lg:text-4xl">
        {{ $numbers }}
    </div>
</div>
