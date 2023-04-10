<x-layout>
    <main>
        <div class="flex">
            <section class="w-2/3 py-8 px-24 flex-1">
                <!-- container -->
                <div class="w-2/3 flex flex-col gap-4">
                    <!-- heading -->
                    <div>
                        <h1 class="font-black text-2xl">Welcome back</h1>
                        <p class="text-dark-60 mt-3 text-xl">Welcome back! Please enter your details</p>
                    </div>
                    <!-- form group -->
                    <div>
                        <div>
                            <label for="username" class="font-bold block">Username</label>
                            <input type="text" id="username" class="mt-2 py-1 px-6 border border-1 border-dark-20 rounded-lg h-14 w-full" placeholder="Enter unique username or email" />
                        </div>
                        <div class="mt-4">
                            <label for="username" class="font-bold block">Password</label>
                            <input type="text" id="username" class="mt-2 py-1 px-6 border border-1 border-dark-20 rounded-lg h-14 w-full" placeholder="Fill in password" />
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" class="mr-1.5 w-5 h-5 border-dark-20 rounded">
                            <label for="remember" class="font-semibold text-sm">Remember this device</label>
                        </div>
                        <div>
                            <a href="#" class="text-brand-primary font-semibold text-sm">Forgot password?</a>
                        </div>
                    </div>
                    <div>
                        <button class="w-full bg-brand-secondary p-3 text-white rounded-lg font-black">LOG IN</button>
                    </div>
                    <footer class="text-center">
                        <p class="text-dark-100">Don’t have an account? <a href="#" class="text-black font-bold">Sign up for free</a></p>
                    </footer>
                </div>
            </section>
            <figure class="w-2/5 max-h-screen overflow-hidden">
                <img src="{{ asset("images/vaccine.png") }}" alt="Vaccine Image">
            </figure>
        </div>
    </main>
</x-layout>
