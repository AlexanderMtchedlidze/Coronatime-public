<x-layout>
    <x-_statistics-header :touchEdge="true">
        <x-slot:title>{{ trans('country-statistics.heading') }}</x-slot:title>
        <div class="flex relative mt-5">
            <img src="{{ asset("icons/search.svg") }}" alt="Search icon"
                 class="absolute top-1/2 transform -translate-y-1/2 left-4">
            <input type="text" name="country" class="h-12 w-full border-transparent sm:w-60 sm:border sm:border-dark-4 rounded-lg pl-12 pr-5"
                   placeholder="{{ trans('country-statistics.searchPlaceholder') }}">
        </div>
        <div class="flex flex-col mt-5 overflow-y-auto h-96 rounded-lg px-0">
            <div class="-my-2 sm:-mx-6 lg:-mx-8">
                <div class="py-2 sm:px-6 lg:px-8">
                    <div class="shadow border-b border-gray-200">
                        <table class="w-full divide-y">
                            <thead class="bg-dark-4 sticky top-0 z-10">
                            <tr>
                                <x-table-cell :head="true">{{ trans('country-statistics.location') }}</x-table-cell>
                                <x-table-cell :head="true">{{ trans('country-statistics.newCases') }}</x-table-cell>
                                <x-table-cell :head="true">{{ trans('country-statistics.recovered') }}</x-table-cell>
                                <x-table-cell :head="true">{{ trans('country-statistics.death') }}</x-table-cell>
                            </tr>
                            </thead>
                            <tbody class="divide-y bg-white">
                            <tr>
                                <x-table-cell>{{ trans('country-statistics.worldwide') }}</x-table-cell>
                                <x-table-cell>9,704,000</x-table-cell>
                                <x-table-cell>66,591</x-table-cell>
                                <x-table-cell>5,803,905</x-table-cell>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-_statistics-header>
</x-layout>
