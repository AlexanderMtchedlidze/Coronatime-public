<x-layout>
    <x-_reset-header>
        <div class="flex justify-between items-center">
            <h1 class="text-center font-black text-xl lg:text-2xl">{{ trans('reset_password.heading') }}</h1>
            <x-lang-dropdown/>
        </div>
        <x-form.input name="password" type="password"
                      placeholder="{{ trans('set_password.passwordPlaceholder') }}"
                      label="{{ trans('set_password.passwordLabel') }}"/>
        <x-form.input name="repeat-password" type="password"
                      placeholder="{{ trans('set_password.repeatPasswordPlaceholder') }}"
                      label="{{ trans('set_password.repeatPasswordLabel') }}"/>
        <x-form.submit-button class="mt-auto mb-56">{{ trans('set_password.submitButtonText') }}</x-form.submit-button>
    </x-_reset-header>
</x-layout>
