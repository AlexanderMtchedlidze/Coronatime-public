<x-layout>
    <x-_auth-header>
        <!-- form group -->
        <div>
            <x-form.input name="username" placeholder="Enter unique username or email"/>
            <x-form.input name="password" type="password" placeholder="Fill in password"/>
        </div>

        <!-- utility section -->
        <x-form.auth.utility-section />

        <x-slot name="footer">
            <x-form.submit-button>LOG IN</x-form.submit-button>
            <x-_footer>
                <p class="text-dark-100">Don’t have an account? <a href="#" class="text-black font-bold">Sign up for
                        free</a></p>
            </x-_footer>
        </x-slot>
    </x-_auth-header>
</x-layout>
