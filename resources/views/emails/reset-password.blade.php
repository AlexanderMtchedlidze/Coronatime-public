@php
    $url = route('password.reset', ['token' => $token]) . "?email=" . $email
@endphp

<x-_email-header :url="$url">
    <x-slot:heading>{{ __('reset-password.emailHeading') }}</x-slot:heading>
    <x-slot:subHeading>{{ __('reset-password.subHeading') }}</x-slot:subHeading>
    {{ __('reset-password.emailSubmitButtonText') }}
</x-_email-header>
