<x-layout>
    <x-_statistics-header>
        <div class="grid grid-rows-2 grid-cols-2 md:grid-rows-1 md:grid-cols-3 gap-5 md:gap-10 py-10">
            <x-statistics-card class="col-span-2 md:col-span-1 md:row-start-1" color="brand-primary">
                <img src="{{ asset('statistics/new-cases.svg') }}" alt="New cases vector" class="h-16 w-24">
                <x-slot:title>New cases</x-slot:title>
                <x-slot:numbers class="text-brand-primary">715,523</x-slot:numbers>
            </x-statistics-card>
            <x-statistics-card class="row-start-2 md:row-start-1" color="brand-secondary">
                <img src="{{ asset("statistics/recovered.svg") }}" alt="Recovered vector" class="h-16 w-24">
                <x-slot:title>Recovered</x-slot:title>
                <x-slot:numbers class="text-brand-secondary">72,005</x-slot:numbers>
            </x-statistics-card>
            <x-statistics-card class="row-start-2 md:row-start-1" color="brand-tertiary">
                <img src="{{ asset("statistics/death.svg") }}" alt="Death vector" class="h-16 w-24">
                <x-slot:title>Death</x-slot:title>
                <x-slot:numbers class="text-brand-tertiary">8,332</x-slot:numbers>
            </x-statistics-card>
        </div>
    </x-_statistics-header>
</x-layout>
