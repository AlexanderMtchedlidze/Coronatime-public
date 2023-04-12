<x-layout>
    <x-_reset-header>
        <x-form.input name="email" type="email" placeholder="{{ trans('reset_password.emailPlaceholder') }}"
                      label="{{ trans('reset_password.emailLabel') }}"/>
        <x-form.submit-button class="mt-auto mb-56">{{ trans('reset_password.submitButtonText') }}</x-form.submit-button>
    </x-_reset-header>
</x-layout>
