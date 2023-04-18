<x-layout class="overflow-hidden">
    <x-_reset-header>
        <div class="flex justify-between items-center">
            <h1 class="text-center font-black text-xl lg:text-2xl">{{ trans('forgot-password.heading') }}</h1>
            <x-lang-dropdown/>
        </div>
        <form action="{{ route("password.email") }}" method="POST">
            @csrf
            <x-form.input name="email" type="email" placeholder="{{ trans('forgot-password.emailPlaceholder') }}"
                          label="{{ trans('forgot-password.emailLabel') }}"/>
            <x-form.submit-button class="mt-64">{{ trans('forgot-password.submitButtonText') }}</x-form.submit-button>
        </form>
    </x-_reset-header>
</x-layout>
