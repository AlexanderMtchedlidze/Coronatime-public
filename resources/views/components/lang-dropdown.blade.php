<x-dropdown>
    <x-slot:trigger>
        <button class="flex justify-between items-center gap-1">
            <span>{{ trans("lang." . $currentLang) }}</span>
            <img src="{{ asset("icons/down-arrow.svg") }}" alt="Down arrow icon">
        </button>
    </x-slot:trigger>

    @if ($currentLang === "en")
        <form action="{{ route('set_lang', ["lang" => "ka"]) }}" method="POST">
            @csrf

            <button type="submit">{{ trans('lang.ka') }}</button>
        </form>
    @else
        <form action="{{ route('set_lang', ["lang" => "en"]) }}" method="POST">
            @csrf

            <button type="submit">{{ trans('lang.en') }}</button>
        </form>
    @endif
</x-dropdown>

