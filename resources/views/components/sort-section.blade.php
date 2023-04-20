@props(["name"])

@php
    $baseUrl = route('dashboard.by_country');

    $statsQuery = "&statistics=location";
    if ($name !== "location") {
        $statsQuery = "&statistics=$name";
    }

    $searchQuery = "?";
    if (request("name")) {
        $searchQuery = "?name=" . request("name") . "&";
    }

    $ascUrl = $baseUrl . $searchQuery . "sort=asc" . $statsQuery;
    $descUrl = $baseUrl. $searchQuery . "sort=desc" . $statsQuery;
    $fullUrl = urldecode(request()->fullUrl());
@endphp

<form action="{{ route('dashboard.by_country') }}" method="GET">
    <div class="flex flex-col gap-1">
        <button type="submit" name="sort" value="asc">
            @if($ascUrl === $fullUrl)
                <img src="{{ asset("icons/sort/up-sort-active.svg") }}" alt="Active ascending sort icon">
            @else
                <img src="{{ asset("icons/sort/up-sort-inactive.svg") }}" alt="Inactive ascending sort icon">
            @endif
        </button>
        <button type="submit" name="sort" value="desc">
            @if($descUrl === $fullUrl)
                <img src="{{ asset("icons/sort/down-sort-active.svg") }}" alt="Active descending sort icon">
            @else
                <img src="{{ asset("icons/sort/down-sort-inactive.svg") }}" alt="Inactive descending sort icon">
            @endif
        </button>
    </div>
    <input type="hidden" name="statistics" value="{{ $name }}">
    @if(request("name"))
        <input type="hidden" name="name" value="{{ request("name") }}">
    @endif
</form>
