<x-layout class="overflow-hidden">
    <x-_reset-header>
        <div class="flex justify-between items-center">
            <h1 class="text-center font-black text-xl lg:text-2xl">{{ __('reset-password.heading') }}</h1>
            <x-lang-dropdown/>
        </div>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <x-form.input name="password" type="password"
                          placeholder="{{ __('reset-password.passwordPlaceholder') }}"
                          label="{{ __('reset-password.passwordLabel') }}"/>
            <x-form.input name="password_confirmation" type="password"
                          placeholder="{{ __('reset-password.repeatPasswordPlaceholder') }}"
                          label="{{ __('reset-password.repeatPasswordLabel') }}"/>
            <input name="email" type="hidden" value="{{ request('email') }}">
            <input name="token" type="hidden" value="{{ $token }}">
            <x-form.submit-button class="mt-40 md:mt-16">{{ __('reset-password.submitButtonText') }}</x-form.submit-button>
        </form>
    </x-_reset-header>
</x-layout>
