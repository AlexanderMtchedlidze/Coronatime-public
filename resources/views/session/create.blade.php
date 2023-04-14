<x-layout>
    <x-_auth-header>
        <!-- header -->
        <x-slot:heading>{{ trans('log-in.heading') }}</x-slot:heading>
        <x-slot:subheading>{{ trans('log-in.subHeading') }}</x-slot:subheading>

        <!-- form group -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <x-form.input name="username" placeholder="{{ trans('log-in.usernamePlaceholder') }}"
                          label="{{ trans('log-in.usernameLabel') }}"/>
            <x-form.input name="password" type="password" placeholder="{{ trans('log-in.passwordPlaceholder') }}"
                          label="{{ trans('log-in.passwordLabel') }}"/>

            <!-- utility section -->
            <x-form.auth.utility-section/>

            <x-form.submit-button>{{ trans('log-in.submitButtonText') }}</x-form.submit-button>
        </form>

        <x-_footer>
            <p class="text-dark-100">
                <span>{{ trans('log-in.don\'tHaveAccount') }}</span>
                <a href="{{ route('register.create') }}" class="text-black font-bold">{{ trans('log-in.signUp') }}</a>
            </p>
        </x-_footer>
    </x-_auth-header>
</x-layout>
