<x-_email-header :url="$verificationUrl">
    <x-slot:heading>{{ __('email.heading') }}</x-slot:heading>
    <x-slot:subheading>{{ __('email.subHeading') }}</x-slot:subheading>
    {{ __('email.actionText') }}
</x-_email-header>
