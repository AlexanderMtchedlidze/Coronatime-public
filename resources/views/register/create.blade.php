<x-layout>
    <x-_auth-header>
        <div>
            <h1 class="font-black text-2xl">Welcome back</h1>
            <p class="text-dark-60 mt-3 text-xl">Welcome back! Please enter your details</p>
        </div>
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
            <button class="w-full bg-brand-secondary p-3 text-white rounded-lg font-black">SIGN UP</button>
            <footer class="text-center">
                <p class="text-dark-100">Already have an account? <a href="{{ route('login') }}"
                                                                     class="text-black font-bold">Log
                        in</a></p>
            </footer>
        </x-slot>
    </x-_auth-header>
</x-layout>
