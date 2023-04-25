@php
    $url = route('password.reset', ['token' => $token]) . "?email=" . $email
@endphp

<x-_email-header :url="$url">
    <x-slot name="heading">{{ __('reset-password.emailHeading') }}</x-slot>
    <x-slot name="subheading">{{ __('reset-password.subHeading') }}</x-slot>
    {{ __('reset-password.emailSubmitButtonText') }}
</x-_email-header>
