<x-layout>
    <x-_auth-header>
        <!-- header -->
        <x-slot:heading>{{ trans('log_in.heading') }}</x-slot:heading>
        <x-slot:subheading>{{ trans('log_in.subHeading') }}</x-slot:subheading>

        <!-- form group -->
        <div>
            <x-form.input name="username" placeholder="{{ trans('log_in.usernamePlaceholder') }}"
                          label="{{ trans('log_in.usernameLabel') }}"/>
            <x-form.input name="password" type="password" placeholder="{{ trans('log_in.passwordPlaceholder') }}"
                          label="{{ trans('log_in.passwordLabel') }}"/>
        </div>

        <!-- utility section -->
        <x-form.auth.utility-section />

        <x-slot name="footer">
            <x-form.submit-button>{{ trans('log_in.submitButtonText') }}</x-form.submit-button>
            <x-_footer>
                <p class="text-dark-100">
                    <span>{{ trans('log_in.don\'tHaveAccount') }}</span>
                    <a href="{{ route('register') }}" class="text-black font-bold">{{ trans('log_in.signUp') }}</a>
                </p>
            </x-_footer>
        </x-slot>
    </x-_auth-header>
</x-layout>
