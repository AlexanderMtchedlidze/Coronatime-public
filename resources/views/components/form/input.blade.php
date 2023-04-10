@props(["name", "type" => "text", "placeholder" => "", "labelName" => "$name"])

<x-form.field>
    <x-form.label :name="$labelName"/>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        class="mt-2 py-1 px-6 border border-1 border-dark-20 rounded-lg h-14 w-full"
        placeholder="{{ $placeholder }}"
    />
</x-form.field>

