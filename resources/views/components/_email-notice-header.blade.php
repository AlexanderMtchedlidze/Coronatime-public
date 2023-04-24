<x-_reset-header>
    <div class="flex flex-col items-center justify-center gap-5 mt-16">
        <img src="{{ asset('icons/icons8-checkmark.gif') }}" alt="Checkmark gif">
        <p class="text-base md:text-lg text-center">
            {{ $heading }}
        </p>

        {{ $slot }}
    </div>
</x-_reset-header>

