@props(["route"])

<a href="{{ route($route) }}"
   class="text-sm lg:text-base {{ request()->routeIs($route) ? "pb-3 border-b-4 border-dark-100" : ""}}">{{ $slot }}</a>
