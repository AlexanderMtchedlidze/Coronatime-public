@props(["touchEdge" => false])

<header class="flex justify-between py-6 px-4 md:px-12 lg:px-18 xl:px-24 border-b border-b-dark-4">
    @include("_brand-logo")
    <div class="flex gap-5 items-center">
        <x-lang-dropdown />

        <p class="hidden md:block font-bold border-r border-dark-20 py-2 pr-6">{{ auth()->user()->name }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="hidden md:block">{{ trans('statistics-header.logOut') }}</button>
        </form>

        <x-dropdown :touchEdge="true">
            <x-slot:trigger>
                <img src="{{ asset("statistics/menu.svg") }}" alt="Menu Icon" class="block md:hidden">
            </x-slot:trigger>
            <span class="font-bold py-2 pr-6">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">{{ trans('statistics-header.logOut') }}</button>
            </form>
        </x-dropdown>
    </div>
</header>
<main class="py-10 md:px-6 lg:px-12 xl:px-18 overflow-y-auto md:overflow-hidden">
    <div class="px-4">
        <h1 class="font-extrabold text-xl lg:text-2xl">{{ $title }}</h1>

        <nav class="flex gap-16 border-b border-dark-4 mt-10">
            <x-statistics-link route="dashboard.worldwide">{{ trans('statistics-header.worldwide') }}</x-statistics-link>
            <x-statistics-link route="dashboard.by_country">{{ trans('statistics-header.byCountry') }}</x-statistics-link>
        </nav>
    </div>
    <div class="{{ $touchEdge ? "px-0 sm:px-2" : "px-4" }}">
        {{ $slot }}
    </div>
</main>
