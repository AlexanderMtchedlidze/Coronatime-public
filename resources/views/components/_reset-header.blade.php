<header class="mt-5 flex flex-col items-center">@include("_brand-logo")</header>
<main class="xl:w-1/3 xl:px-8 xl:h-full lg:w-2/5 lg:px-6 lg:h-full md:w-2/4 md:px-4 md:h-full px-4 flex flex-col gap-10 mx-auto mt-36 h-screen">
    <div class="flex justify-between items-center">
        <h1 class="text-center font-black text-xl lg:text-2xl">{{ trans('reset_password.heading') }}</h1>
        <x-lang-dropdown />
    </div>
    {{ $slot }}
</main>
