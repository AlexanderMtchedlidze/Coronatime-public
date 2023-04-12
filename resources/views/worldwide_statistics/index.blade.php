<x-layout>
    <x-_statistics-header>
        <div class="grid grid-rows-2 grid-cols-2 md:grid-rows-1 md:grid-cols-3 gap-5 md:gap-10 py-10">
            <x-statistics-card color="brand-primary" type="pr">
                <img src="{{ asset('statistics/new-cases.svg') }}" alt="New cases vector" class="h-16 w-24">
                <x-slot:title>New cases</x-slot:title>
                <x-slot:numbers class="text-brand-primary">715,523</x-slot:numbers>
            </x-statistics-card>
            <x-statistics-card color="brand-secondary" type="sec">
                <img src="{{ asset("statistics/recovered.svg") }}" alt="Recovered vector" class="h-16 w-24">
                <x-slot:title>Recovered</x-slot:title>
                <x-slot:numbers class="text-brand-secondary">72,005</x-slot:numbers>
            </x-statistics-card>
            <x-statistics-card color="brand-tertiary" type="sec">
                <img src="{{ asset("statistics/death.svg") }}" alt="Death vector" class="h-16 w-24">
                <x-slot:title>Death</x-slot:title>
                <x-slot:numbers class="text-brand-tertiary">8,332</x-slot:numbers>
            </x-statistics-card>
        </div>
    </x-_statistics-header>
</x-layout>
