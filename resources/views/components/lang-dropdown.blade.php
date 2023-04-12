@props(['currentLang'])

<div x-data="{ show: false }" @click.away="show = false">
    <div @click="show = ! show">
        <button class="flex justify-between items-center gap-1">
            <span>{{ trans("lang." . $currentLang) }}</span>
            <img src="{{ asset("icons/down-arrow.svg") }}" alt="Down arrow icon">
        </button>
    </div>

    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl z-50 overflow-auto max-h-52 px-2"
         style="display: none">
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
    </div>
</div>
