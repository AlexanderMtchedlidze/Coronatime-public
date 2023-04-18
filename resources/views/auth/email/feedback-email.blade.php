<x-layout>
    <x-_email-header>
        <x-slot:heading>{{ trans('email.success') }}</x-slot:heading>
        <a href="{{ route('login')  }}" class="bg-brand-secondary text-white px-36 py-2 rounded-lg mt-10">{{ trans('log-in.submitButtonText') }}</a>
    </x-_email-header>
</x-layout>
