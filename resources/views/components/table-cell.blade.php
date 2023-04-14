@props(["head" => false])

<td class="px-2 sm:px-4 md:px-12 py-4 text-xs sm:text-sm {{ $head ? "font-semibold" : ""}}">
    <div class="flex items-center gap-2">
        {{ $slot }}
        @if($head)
            <x-sort-section />
        @endif
    </div>
</td>
