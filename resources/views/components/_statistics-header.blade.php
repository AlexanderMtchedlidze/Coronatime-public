<header class="flex justify-between py-4 px-24">
    @include("_brand-logo")
    <div class="flex gap-5 items-center">
        <x-lang-dropdown/>
        <p class="font-bold border-r border-dark-20 pr-4 py-2">Takeshi K.</p>
        <a href="#">Log Out</a>
    </div>
</header>
<main class="bg-lightest-gray h-screen py-10 px-24">
    <div>
        <h1 class="font-extrabold text-2xl">Worldwide Statistics</h1>

        <nav class="font-bold flex gap-16 border-b-2 border-dark-4 mt-10">
            <a href="#" class="pb-3 border-b-4 border-dark-100">Worldwide</a>
            <a href="#">By country</a>
        </nav>
    </div>
    {{ $slot }}
</main>
