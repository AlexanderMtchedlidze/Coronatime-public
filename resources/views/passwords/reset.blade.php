<x-layout>
    <x-_reset-header>
        <div class="flex justify-between items-center">
            <h1 class="text-center font-black text-xl lg:text-2xl">{{ trans('reset-password.heading') }}</h1>
            <x-lang-dropdown />
        </div>
        <x-form.input name="email" type="email" placeholder="{{ trans('reset-password.emailPlaceholder') }}"
                      label="{{ trans('reset-password.emailLabel') }}"/>
        <x-form.submit-button class="mt-auto mb-56">{{ trans('reset-password.submitButtonText') }}</x-form.submit-button>
    </x-_reset-header>
</x-layout>
