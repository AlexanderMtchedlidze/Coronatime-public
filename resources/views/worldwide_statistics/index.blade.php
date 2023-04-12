<x-layout>
    <x-_statistics-header>
        <div class="flex gap-10 mt-10">
            <x-statistics-card class="" color="brand-primary">
                <img src="{{ asset('statistics/new-cases.svg') }}" alt="New cases vector">
                <x-slot:title>New cases</x-slot:title>
                <x-slot:numbers class="text-brand-primary">715,523</x-slot:numbers>
            </x-statistics-card>
            <x-statistics-card class="" color="brand-secondary">
                <img src="{{ asset("statistics/recovered.svg") }}" alt="Recovered vector">
                <x-slot:title>Recovered</x-slot:title>
                <x-slot:numbers class="text-brand-secondary">72,005</x-slot:numbers>
            </x-statistics-card>
            <x-statistics-card class="" color="brand-tertiary">
                <img src="{{ asset("statistics/death.svg") }}" alt="Death vector">
                <x-slot:title>Death</x-slot:title>
                <x-slot:numbers class="text-brand-tertiary">8,332</x-slot:numbers>
            </x-statistics-card>
        </div>
    </x-_statistics-header>
</x-layout>
