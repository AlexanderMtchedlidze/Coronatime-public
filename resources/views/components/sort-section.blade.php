@props(["name"])

@php
     $baseUrl = route('dashboard.by_country');
     $ascUrl = $baseUrl . "?sort=asc&statistics=$name";
     $descUrl = $baseUrl. "?sort=desc&statistics=$name";
@endphp

<div>
    <a href="{{ $ascUrl }}">
        @if($ascUrl === request()->fullUrl())
            <img src="{{ asset("icons/sort/up-sort-active.svg") }}" alt="Active ascending sort icon">
        @else
            <img src="{{ asset("icons/sort/up-sort-inactive.svg") }}" alt="Inactive ascending sort icon">
        @endif
    </a>
    <a href="{{ $descUrl }}">
        @if($descUrl === request()->fullUrl())
            <img src="{{ asset("icons/sort/down-sort-active.svg") }}" alt="Active descending sort icon" class="mt-0.5">
        @else
            <img src="{{ asset("icons/sort/down-sort-inactive.svg") }}" alt="Inactive descending sort icon"
                 class="mt-0.5">
        @endif
    </a>
</div>
