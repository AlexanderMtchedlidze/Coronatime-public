<x-layout>
    <x-_auth-header>
        <!-- form group -->
        <div>
            <div>
                <x-form.input name="username" placeholder="Enter unique username"/>
                <p class="text-dark-60 mt-1">Username should be unique, min 3 symbols</p>
            </div>
            <x-form.input name="email" type="email" placeholder="Enter your email"/>
            <x-form.input name="password" type="password" placeholder="Fill in password"/>
            <x-form.input name="repeat-password" type="password" placeholder="Repeat your password"
                          label-name="Repeat password"/>
        </div>

        <x-slot name="footer">
            <x-form.submit-button>SIGN UP</x-form.submit-button>
            <x-_footer>
                <p class="text-dark-100">Already have an account? <a href="{{ route('login') }}"
                                                                     class="text-black font-bold">Log
                        in</a></p>
            </x-_footer>
        </x-slot>
    </x-_auth-header>
</x-layout>
