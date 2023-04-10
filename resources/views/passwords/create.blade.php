<x-layout>
    <div class="flex flex-col items-center">
        <header class="mt-5">@include("_brand-logo")</header>
        <main class="w-1/3 flex flex-col gap-10 mt-36">
            <header class="text-center font-black text-2xl">Reset Password</header>
            <x-form.input name="email" type="email" placeholder="Enter your email" />
            <button class="w-full bg-brand-secondary p-3 text-white rounded-lg font-black">RESET PASSWORD</button>
        </main>
    </div>
</x-layout>
