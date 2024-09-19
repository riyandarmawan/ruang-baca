<x-base-layout title="{{ $title }}">
    <div class="h-dvh container flex items-center justify-center">
        <div class="w-[30rem] rounded-xl bg-primary px-4 py-6 text-background md:px-6">
            <h1 class="mb-8 text-center text-xl font-bold">Masuk ke akun Anda</h1>
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <input type="text" name="username" id="username" required placeholder="Masukkan username anda"
                        autofocus value="{{ $errors->has('username ') ? '' : old('username') }}"
                        class="{{ $errors->has('username') ? 'input-error' : '' }} w-full rounded p-2 text-primary outline-none">
                    @error('username')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div x-data="{ show: false }" class="relative mb-5 flex flex-col items-end">
                    <input x-bind:type="show ? 'text' : 'password'" required name="password" id="password"
                        placeholder="Masukkan password anda" autofocus
                        class="{{ $errors->has('password') ? 'input-error' : '' }} mb-2 w-full rounded p-2 text-primary outline-none">
                    @error('password')
                        <p class="self-start col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                    <a href="" class="text-link text-right text-sm">Lupa password?</a>
                    <div class="absolute flex items-center rounded-r bg-secondary p-2">
                        <span x-on:click="show = !show" x-bind:class="show ? 'i-mdi-eye-off' : 'i-mdi-eye '"
                            class="cursor-pointer bg-primary text-right text-2xl"></span>
                    </div>
                </div>
                <button
                    class="w-full rounded bg-background py-2 font-bold text-primary hover:opacity-90 focus:opacity-70 active:opacity-80">Masuk</button>
            </form>
            <a href="" class="mt-6 block text-center text-xs">kebijakan privasi</a>
        </div>
    </div>
</x-base-layout>
