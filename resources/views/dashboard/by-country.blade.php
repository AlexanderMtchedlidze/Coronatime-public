<x-layout>
    <x-_statistics-header :touchEdge="true">
        <x-slot:title>{{ trans('country-statistics.heading') }}</x-slot:title>
        <div class="flex relative mt-5">
            <img src="{{ asset("icons/search.svg") }}" alt="Search icon"
                 class="absolute top-1/2 transform -translate-y-1/2 left-4">
            <form action="{{ route('dashboard.by_country') }}" method="GET" class="w-full md:w-96">
                <input type="text" name="name" value="{{ request("name") }}"
                       class="h-12 border-transparent sm:border sm:border-dark-4 rounded-lg pl-12 pr-5 w-full"
                       placeholder="{{ trans('country-statistics.searchPlaceholder') }}">
            </form>
        </div>
        <div class="flex flex-col mt-5 overflow-y-auto overflow-x-hidden h-96 rounded-lg">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="sm:px-6 lg:px-8">
                    <div class="shadow">
                        <table class="w-full divide-y border border-dark-4">
                            <thead class="bg-dark-4 sticky top-0 z-10">
                            <tr>
                                <x-table-cell :head="true"
                                              name="location" :active="true">{{ trans('country-statistics.location') }}</x-table-cell>
                                <x-table-cell :head="true"
                                              name="confirmed">{{ trans('country-statistics.newCases') }}</x-table-cell>
                                <x-table-cell :head="true"
                                              name="recovered">{{ trans('country-statistics.recovered') }}</x-table-cell>
                                <x-table-cell :head="true"
                                              name="deaths">{{ trans('country-statistics.death') }}</x-table-cell>
                            </tr>
                            </thead>
                            <tbody class="divide-y bg-white">
                            <tr>
                                <x-table-cell>{{ trans('country-statistics.worldwide') }}</x-table-cell>
                                <x-table-cell>{{ $totals["newCases"] }}</x-table-cell>
                                <x-table-cell>{{ $totals["recovered"] }}</x-table-cell>
                                <x-table-cell>{{ $totals["deaths"] }}</x-table-cell>
                            </tr>
                            @foreach($countries as $country)
                                <tr>
                                    <x-table-cell>{{ $country->name }}</x-table-cell>
                                    <x-table-cell>{{ $country->confirmed }}</x-table-cell>
                                    <x-table-cell>{{ $country->recovered }}</x-table-cell>
                                    <x-table-cell>{{ $country->deaths }}</x-table-cell>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-_statistics-header>
</x-layout>
