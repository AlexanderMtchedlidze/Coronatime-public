<x-layout>
    <x-_auth-header>
        <!-- header -->
        <x-slot:heading>{{ trans('log_in.heading') }}</x-slot:heading>
        <x-slot:subheading>{{ trans('log_in.subHeading') }}</x-slot:subheading>

        <!-- form group -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <x-form.input name="username" placeholder="{{ trans('log_in.usernamePlaceholder') }}"
                          label="{{ trans('log_in.usernameLabel') }}"/>
            <x-form.input name="password" type="password" placeholder="{{ trans('log_in.passwordPlaceholder') }}"
                          label="{{ trans('log_in.passwordLabel') }}"/>

            <!-- utility section -->
            <x-form.auth.utility-section/>

            <x-form.submit-button>{{ trans('log_in.submitButtonText') }}</x-form.submit-button>
        </form>

        <x-_footer>
            <p class="text-dark-100">
                <span>{{ trans('log_in.don\'tHaveAccount') }}</span>
                <a href="{{ route('register.create') }}" class="text-black font-bold">{{ trans('log_in.signUp') }}</a>
            </p>
        </x-_footer>
    </x-_auth-header>
</x-layout>
