@props(["head" => false, "name"])

<td class="px-1 sm:px-2 md:px-4 py-4 text-xs xl:text-sm whitespace-nowrap {{ $head ? "font-semibold" : ""}}">
    <div class="flex items-center gap-2">
        {{ $slot }}
        @if($head)
            <x-sort-section :name="$name" />
        @endif
    </div>
</td>
