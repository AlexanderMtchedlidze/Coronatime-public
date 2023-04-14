<header class="flex justify-between py-4 px-6 md:px-12 lg:px-18 xl:px-24">
    @include("_brand-logo")
    <div class="flex gap-5 items-center">
        <x-lang-dropdown />

        <p class="hidden md:block font-bold border-r border-dark-20 py-2 pr-6">Takeshi K.</p>
        <a href="#" class="hidden md:block">Log Out</a>

        <x-dropdown>
            <x-slot:trigger>
                <img src="{{ asset("statistics/menu.svg") }}" alt="Menu Icon" class="block md:hidden">
            </x-slot:trigger>
        </x-dropdown>
    </div>
</header>
<main class="bg-lightest-gray h-screen py-10 px-6 md:px-12 lg:px-18 xl:px-24">
    <div>
        <h1 class="font-extrabold text-2xl lg:text-xl">{{ $title }}</h1>

        <nav class="font-bold flex gap-16 border-b-2 border-dark-4 mt-10">
            <x-statistics-link route="dashboard.worldwide">Worldwide</x-statistics-link>
            <x-statistics-link route="dashboard.by_country">By country</x-statistics-link>
        </nav>
    </div>
    {{ $slot }}
</main>
