<x-layout>
    <main class="flex">
        <section class="w-2/3 py-8 px-24 flex-1 overflow-auto h-screen">
            <!-- container -->
            <div class="w-2/3 flex flex-col gap-4">
                <!-- heading -->
                <header class="flex ps-1 pb-8">
                    @include("_brand-logo")
                </header>

                {{ $slot }}

                <!-- utility section -->
                <x-form.auth.utility-section/>

                {{ $footer }}
            </div>
        </section>
        <figure class="w-2/5 max-h-screen overflow-hidden">
            <img src="{{ asset("images/vaccine.png") }}" alt="Vaccine Image">
        </figure>
    </main>
</x-layout>
