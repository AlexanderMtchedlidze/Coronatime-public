@props(["name"])

@error($name)
<div class="flex gap-2 items-center mt-2">
    <img src="{{ asset('icons/system-error.svg') }}" alt="System error icon">
    <p class="text-system-error text-sm font-medium">{{ $message }}</p>
</div>
@enderror
