<x-layout>
    <main class="flex">
        <section class="xl:w-2/3 xl:pt-8 xl:px-24 lg:pt-6 lg:px-18 md:pt-4 md:px-12 pt-2 pb-12 px-6 w-full flex-1 overflow-auto h-screen">
            <!-- container -->
            <div class="lg:w-2/3 sm:w-full flex flex-col gap-4">
                <!-- heading -->
                <header class="mb-8 mt-4">
                    @include("_brand-logo")
                </header>

                <div>
                    <h1 class="font-black text-2xl">Welcome back</h1>
                    <p class="text-dark-60 mt-3 text-xl">Welcome back! Please enter your details</p>
                </div>

                {{ $slot }}

                <div>
                    {{ $footer }}
                </div>
            </div>
        </section>
        <figure class="hidden lg:block w-2/5 max-h-screen overflow-hidden">
            <img src="{{ asset("images/vaccine.png") }}" alt="Vaccine Image">
        </figure>
    </main>
</x-layout>
