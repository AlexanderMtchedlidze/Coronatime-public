@props(["name", "type" => "text", "placeholder", "label"])

@php
    $hasValidValue = !empty((old($name)) && !$errors->has($name));

    $inputClass = "mt-2 py-1 px-6 border border-dark-20 rounded-lg h-14 w-full";
    if ($hasValidValue) {
        $inputClass .= " border-system-success";
    } elseif ($errors->has($name)) {
        $inputClass .= " border-system-error";
    }
@endphp

<x-form.field>
    <x-form.label :name="$name" :text="$label"/>
    <div class="flex relative">
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            class="{{ $inputClass }}"
            placeholder="{{ $placeholder }}"
            value="{{ $type !== "password" ? old("$name") : "" }}"
        />
        @if($hasValidValue)
            <img src="{{ asset('icons/system-success.svg') }}" alt="System success icon"
                 class="absolute right-0 mr-5 mt-1 top-1/2 transform -translate-y-1/2">
        @endif
    </div>
    <x-form.error :name="$name"/>
</x-form.field>

