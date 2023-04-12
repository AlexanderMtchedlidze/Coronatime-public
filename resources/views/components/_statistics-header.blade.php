<header class="flex justify-between py-4 px-6 md:px-12 lg:px-18 xl:px-24">
    @include("_brand-logo")
    <div class="flex gap-5 items-center">
        <x-lang-dropdown/>

        <p class="hidden md:block font-bold border-r border-dark-20 py-2 pr-6">
            Takeshi K.
        </p>
        <a href="#" class="hidden md:block">Log Out</a>
        <img src="{{ asset("statistics/menu.svg") }}" alt="Menu Icon" class="block md:hidden">
    </div>
</header>
<main class="bg-lightest-gray h-screen py-10 px-6 md:px-12 lg:px-18 xl:px-24">
    <div>
        <h1 class="font-extrabold text-2xl lg:text-xl">Worldwide Statistics</h1>

        <nav class="font-bold flex gap-16 border-b-2 border-dark-4 mt-10">
            <a href="#" class="text-sm lg:text-base {{ route("index") ? "pb-3 border-b-4 border-dark-100" : "" }}">Worldwide</a>
            <a href="#" class="text-sm lg:text-base">By country</a>
        </nav>
    </div>
    {{ $slot }}
</main>
