<x-layout>
    <x-_statistics-header>
        <x-slot:title>{{ trans('worldwide-statistics.heading') }}</x-slot:title>
        <div class="grid grid-rows-2 grid-cols-2 md:grid-rows-1 md:grid-cols-3 gap-5 md:gap-10 py-10">
            <x-statistics-card class="bg-brand-primary text-brand-primary" type="pr">
                <img src="{{ asset('statistics/new-cases.svg') }}" alt="New cases vector" class="h-16 w-24">
                <x-slot:title>{{ trans('worldwide-statistics.newCases') }}</x-slot:title>
                <x-slot:numbers>{{ $totals["newCases"] }}</x-slot:numbers>
            </x-statistics-card>
            <x-statistics-card class="bg-brand-secondary text-brand-secondary" type="sec">
                <img src="{{ asset("statistics/recovered.svg") }}" alt="Recovered vector" class="h-16 w-24">
                <x-slot:title>{{ trans('worldwide-statistics.recovered') }}</x-slot:title>
                <x-slot:numbers>{{ $totals["recovered"] }}</x-slot:numbers>
            </x-statistics-card>
            <x-statistics-card class="bg-brand-tertiary text-brand-tertiary" type="sec">
                <img src="{{ asset("statistics/death.svg") }}" alt="Death vector" class="h-16 w-24">
                <x-slot:title>{{ trans('worldwide-statistics.death') }}</x-slot:title>
                <x-slot:numbers>{{ $totals["deaths"] }}</x-slot:numbers>
            </x-statistics-card>
        </div>
    </x-_statistics-header>
</x-layout>
