<x-_email-header :url="$verificationUrl">
    <x-slot:heading>{{ __('email.heading') }}</x-slot:heading>
    <x-slot:subHeading>{{ __('email.subHeading') }}</x-slot:subHeading>
    {{ __('email.actionText') }}
</x-_email-header>
