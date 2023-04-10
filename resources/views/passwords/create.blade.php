<x-layout>
    <div class="flex flex-col items-center">
        <header class="flex mb-36 mt-5">
            <div class="flex">
                <img src="{{ asset("images/logo-left.svg") }}" alt="Left part of brand's logo" class="-mr-2">
                <img src="{{ asset("images/logo-right.svg") }}" alt="Left part of brand's logo">
            </div>
            <div class="flex items-center font-black text-brand-primary text-3xl">
                <p>ronatime</p>
            </div>
        </header>
        <main class="w-1/3 flex flex-col gap-10">
            <header class="text-center font-black text-2xl">Reset Password</header>
            <div>
                <label for="email" class="font-bold block">Email</label>
                <input type="email" id="email"
                       class="mt-2 py-1 px-6 border border-1 border-dark-20 rounded-lg h-14 w-full focus:border-brand-primary focus:ring-4 focus:ring-brand-glow"
                       placeholder="Enter your email"/>
            </div>
            <button class="w-full bg-brand-secondary p-3 text-white rounded-lg font-black">RESET PASSWORD</button>
        </main>
    </div>
</x-layout>
