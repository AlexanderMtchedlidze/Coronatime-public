<x-layout>
    <x-_auth-header>
        <!-- header -->
        <x-slot:heading>{{ trans('sign-up.heading') }}</x-slot:heading>
        <x-slot:subheading>{{ trans('sign-up.subHeading') }}</x-slot:subheading>

        <form action="{{ route('register.create') }}" method="POST">
            @csrf

            <!-- form group -->
            <x-form.input name="name" placeholder="{{ trans('sign-up.usernamePlaceholder') }}"
                          label="{{ trans('sign-up.usernameLabel') }}"/>
            <p class="text-dark-60 mt-1 text-sm">{{ trans('sign-up.usernameHelperText') }}</p>
            <x-form.input name="email" type="email" placeholder="{{ trans('sign-up.emailPlaceholder') }}"
                          label="{{ trans('sign-up.emailLabel') }}"/>
            <x-form.input name="password" type="password" placeholder="{{ trans('sign-up.passwordPlaceholder') }}"
                          label="{{ trans('sign-up.passwordLabel') }}"/>
            <x-form.input name="password_confirmation" type="password"
                          placeholder="{{ trans('sign-up.repeatPasswordPlaceholder') }}"
                          label="{{ trans('sign-up.repeatPasswordLabel') }}" class="mb-2"/>
            <x-form.submit-button>{{ trans('sign-up.submitButtonText') }}</x-form.submit-button>
        </form>

        <!-- footer -->
        <x-_footer>
            <p class="text-dark-100">
                <span>{{ trans('sign-up.alreadyHaveAccount') }}</span>
                <a href="{{ route('login') }}" class="text-black font-bold">
                    {{ trans('sign-up.login') }}
                </a>
            </p>
        </x-_footer>
    </x-_auth-header>
</x-layout>
