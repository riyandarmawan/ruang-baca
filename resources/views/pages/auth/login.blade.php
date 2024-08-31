<x-base-layout title="{{ $title }}">
    <div class="h-dvh container flex items-center justify-center">
        <div class="w-[30rem] rounded-xl bg-primary px-4 py-6 md:px-6 text-background">
            <h1 class="mb-8 text-center text-xl font-bold">Masuk ke akun Anda</h1>
            <form action="" method="POST">
                <div class="mb-4">
                    <input type="text" name="username" id="username" placeholder="Masukkan username anda" autofocus
                        class="w-full rounded p-2 text-primary outline-none">
                </div>
                <div x-data="{ show: false }" class="relative mb-5 flex flex-col items-end">
                    <input x-bind:type="show ? 'text' : 'password'" name="password" id="password"
                        placeholder="Masukkan password anda" autofocus
                        class="mb-2 w-full rounded p-2 text-primary outline-none">
                    <a href="" class="text-link text-right text-sm">Lupa password?</a>
                    <div class="bg-secondary absolute p-2 flex items-center rounded-r">
                        <span x-on:click="show = !show" x-bind:class="show ? 'i-mdi-eye-off' : 'i-mdi-eye '"
                            class="cursor-pointer bg-primary text-right text-2xl"></span>
                    </div>
                </div>
                <button
                    class="w-full rounded bg-background py-2 font-bold text-primary hover:opacity-90 focus:opacity-70 active:opacity-80">Masuk</button>
            </form>
            <a href="" class="text-xs block mt-6 text-center">kebijakan privasi</a>
        </div>
    </div>
</x-base-layout>
