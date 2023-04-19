@props(["name"])

@php
    $url = route('dashboard.by_country') . "?statistics=$name";
    $ascUrl = $url . '&sort=asc';
    $descUrl = $url . '&sort=desc';
@endphp

<div>
    <a href="{{ $ascUrl }}">
        @if(request()->url() === $ascUrl)
            <img src="{{ asset("icons/sort/up-sort-active.svg") }}" alt="Active ascending sort icon">
        @else
            <img src="{{ asset("icons/sort/up-sort-inactive.svg") }}" alt="Inactive ascending sort icon">
        @endif
    </a>
    <a href="{{ $descUrl }}">
        @if(request()->url() === $descUrl)
            <img src="{{ asset("icons/sort/down-sort-active.svg") }}" alt="Active descending sort icon" class="mt-0.5">
        @else
            <img src="{{ asset("icons/sort/down-sort-inactive.svg") }}" alt="Inactive descending sort icon" class="mt-0.5">
        @endif
    </a>
</div>
