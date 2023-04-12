<x-layout>
    <x-_auth-header>
        <!-- header -->
        <x-slot:heading>{{ trans('sign_up.heading') }}</x-slot:heading>
        <x-slot:subheading>{{ trans('sign_up.subHeading') }}</x-slot:subheading>

        <!-- form group -->
        <div>
            <div>
                <x-form.input name="username" placeholder="{{ trans('sign_up.usernamePlaceholder') }}"
                              label-name="{{ trans('sign_up.usernameLabel') }}"/>
                <p class="text-dark-60 mt-1 text-sm">{{ trans('sign_up.usernameHelperText') }}</p>
            </div>
            <x-form.input name="email" type="email" placeholder="{{ trans('sign_up.emailPlaceholder') }}"
                          label-name="{{ trans('sign_up.emailLabel') }}" />
            <x-form.input name="password" type="password" placeholder="{{ trans('sign_up.passwordPlaceholder') }}"
                          label-name="{{ trans('sign_up.passwordLabel') }}" />
            <x-form.input name="repeat-password" type="password" placeholder="{{ trans('sign_up.repeatPasswordPlaceholder') }}"
                          label-name="{{ trans('sign_up.repeatPasswordLabel') }}" />
        </div>

        <!-- footer -->
        <x-slot name="footer">
            <x-form.submit-button>{{ trans('sign_up.submitButtonText') }}</x-form.submit-button>
            <x-_footer>
                <p class="text-dark-100">
                    <span>{{ trans('sign_up.alreadyHaveAccount') }}</span>
                    <a href="{{ route('login') }}" class="text-black font-bold">
                        {{ trans('sign_up.login') }}
                    </a>
                </p>
            </x-_footer>
        </x-slot>
    </x-_auth-header>
</x-layout>
