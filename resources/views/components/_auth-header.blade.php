<x-layout>
    <main class="flex">
        <section
            class="xl:pt-8 xl:px-20 lg:pt-6 lg:px-16 md:pt-4 md:px-12 pt-2 pb-12 px-8 w-full flex-1 overflow-auto h-screen">
            <!-- container -->
            <div class="sm:w-full flex flex-col gap-4">
                <header class="mb-8 mt-4 flex justify-between items-center">
                    @include("_brand-logo")
                    <x-lang-dropdown/>
                </header>

                <div>
                    <h1 class="font-black text-xl lg:text-2xl">
                        {{ $heading }}
                    </h1>
                    <p class="text-dark-60 mt-3 text-lg lg:text-xl">
                        {{ $subheading }}
                    </p>
                </div>

                {{ $slot }}
            </div>
        </section>
        <figure class="hidden lg:block w-2/5 max-h-screen overflow-hidden">
            <img src="{{ asset("images/vaccine.png") }}" alt="Vaccine Image">
        </figure>
    </main>
</x-layout>
