<x-layout>
    <x-_auth-header>
        <div>
            <h1 class="font-black text-2xl">Welcome back</h1>
            <p class="text-dark-60 mt-3 text-xl">Welcome back! Please enter your details</p>
        </div>

        <!-- form group -->
        <div>
            <x-form.input name="username" placeholder="Enter unique username or email"/>
            <x-form.input name="password" type="password" placeholder="Fill in password"/>
        </div>

        <x-slot name="footer">
            <button class="w-full bg-brand-secondary p-3 text-white rounded-lg font-black">LOG IN</button>

            <footer class="text-center">
                <p class="text-dark-100">Don’t have an account? <a href="#" class="text-black font-bold">Sign up for
                        free</a></p>
            </footer>
        </x-slot>
    </x-_auth-header>
</x-layout>
